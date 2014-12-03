<?php
class Template
{
    public $leftTag = "<!--{";
    public $rightTag = "}-->";
    public $tpl_dir;
    public $tpl_ext;
    public $cache_dir;
    public $cache_time;
    public $data = array();
    public function __construct($cfg = NULL)
    {
        if ($cfg) {
            $this->config($cfg);
        }
    }
    public function config($cfg)
    {
        if (is_string($cfg)) {
            $cfg = require $cfg;
        }
        if (isset($cfg['tpl_dir'])) {
            $this->tpl_dir = $cfg['tpl_dir'];
        }
        if (isset($cfg['tpl_ext'])) {
            $this->tpl_ext = $cfg['tpl_ext'];
        }
        if (isset($cfg['cache_dir'])) {
            $this->cache_dir = $cfg['cache_dir'];
        }
        if (isset($cfg['cache_time'])) {
            $this->cache_time = $cfg['cache_time'];
        }
        if (isset($cfg['my_rep'])) {
            $this->my_rep = $cfg['my_rep'];
        }
        if (isset($cfg['data'])) {
            $this->data = $cfg['data'];
        }
    }
    public function assign($name, $value = NULL)
    {
        if (is_array($name)) {
            foreach ($name as $k => $v) {
                $this->data[$k] = $v;
            }
        } else {
            $this->data[$name] =& $value;
        }
    }
    public function display($tpl_file)
    {
        $_cache_path = $this->cache_path($tpl_file);
        if (!$this->is_cached($_cache_path)) {
            $this->compile($this->tpl_path($tpl_file), $_cache_path);
        }
        unset($tpl_file);
        extract($this->data);
        include $_cache_path;
    }
    public function fetch($tpl_file)
    {
        ob_start();
        ob_implicit_flush(0);
        $this->display($tpl_file);
        return ob_get_clean();
    }
    public function tpl_path($tpl_file)
    {
        return $this->tpl_dir . $tpl_file . $this->tpl_ext;
    }
    private function cache_path($tpl_file)
    {
        return $this->cache_dir . $tpl_file . $this->tpl_ext . '.' . md5($GLOBALS['roc_config']['secure_key']) . '.php';
    }
    public function is_cached($cache_path)
    {
        if (!file_exists($cache_path)) {
            return false;
        }
        if ($this->cache_time < 0) {
            return true;
        }
        $cache_time = filemtime($cache_path);
        if (time() - $cache_time > $this->cache_time) {
            return false;
        }
        return true;
    }
    public function compile($tpl_path, $cache_path)
    {
        $tpl = @file_get_contents($tpl_path);
        if ($tpl === FALSE) {
            Error::debug("Template " . $tpl_path . " Does Not Exist");
        }
        $cache = $this->replace($tpl);
        @mkdir(dirname($cache_path), 0777, true);
        $tmp = @file_put_contents($cache_path, $cache, LOCK_EX);
        if ($tmp === FALSE) {
            Error::debug("Can Not Write Into The Compiled File " . $cache_path);
        }
    }
    private function replace($template)
    {
        $template = preg_replace('/' . $this->leftTag . 'loop\s+(\S+)\s+(\S+)' . $this->rightTag . '/', '<?php if(is_array(\\1)) foreach(\\1 as \\2) { ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'loop\s+(\S+)\s+(\S+)\s+(\S+)' . $this->rightTag . '/', '<?php if(is_array(\\1)) foreach (\\1 as \\2 => \\3) { ?>', $template);
        $template = preg_replace('/' . $this->leftTag . '\/loop' . $this->rightTag . '/', '<?php } ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'if\s+(.+?)' . $this->rightTag . '/', '<?php if (\\1) { ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'elseif\s+(.+?)' . $this->rightTag . '/', '<?php }elseif(\\1){ ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'else' . $this->rightTag . '/', '<?php }else{ ?>', $template);
        $template = preg_replace('/' . $this->leftTag . '\/if' . $this->rightTag . '/', '<?php } ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'for\s+(.+?)' . $this->rightTag . '/', '<?php for(\\1) { ?>', $template);
        $template = preg_replace('/' . $this->leftTag . '\/for' . $this->rightTag . '/', '<?php } ?>', $template);
        $template = preg_replace('/' . $this->leftTag . 'include\s(.+?)' . $this->rightTag . '/', '<?php require \$this->_include(\'$1\',__FILE__); ?>', $template);
        $template = preg_replace('/' . $this->leftTag . ':/', '<?php ', $template);
        $search   = array(
            $this->leftTag,
            $this->rightTag
        );
        $replace  = array(
            "<?php echo ",
            "; ?>"
        );
        $template = str_replace($search, $replace, $template);
        return $template;
    }
    public function _include($inc_file, $cache_path)
    {
        $inc_path = dirname($cache_path) . '/' . $inc_file . '.' . md5($GLOBALS['roc_config']['secure_key']) . '.php';
        if (!$this->is_cached($inc_path)) {
            $tpl_path = str_replace(realpath($this->cache_dir), realpath($this->tpl_dir), dirname($cache_path) . '/' . $inc_file);
            $this->compile($tpl_path, $inc_path);
        }
        return $inc_path;
    }
    public function Clean($dir)
    {
        $cachedir = opendir($dir);
        while ($filea = @readdir($cachedir)) {
            if ($filea != "." && $filea != ".." && $filea != "Thumbs.db") {
                unlink($dir . '/' . $filea);
            }
        }
        closedir($cachedir);
    }
}
?>