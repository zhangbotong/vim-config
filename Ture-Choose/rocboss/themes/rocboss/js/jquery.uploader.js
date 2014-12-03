/*! nice Uploader 0.1.0
 * (c) 2012-2013 Jony Zhang <zj86@live.cn>, MIT Licensed
 * http://niceue.com/uploader/
 */
(function(e, t) {
	function i(e) {
		for (var t = -1; e > 1e3;) e /= 1024, t++;
		return Math.max(e, .1).toFixed(1) + ["KB", "M", "G", "T"][t]
	}
	function o(e) {
		var t, i = {
			k: 1024,
			m: 1048576,
			g: 1073741824
		};
		return "string" == typeof e && (t = /^([0-9]+)([mgk]+)$/.exec(e.toLowerCase().replace(/[^0-9mkg]/g, "")), e = +t[1], e *= i[t[2]]), e
	}
	function n(e, t) {
		var i, o, n = e.length;
		return n > t && (o = 5 + (n - e.lastIndexOf(".") - 1), i = t - o - 3, i % 2 && (i -= 1), e = e.substr(0, i) + "..." + e.substr(-o)), e
	}
	function a(e) {
		if (!e) return "";
		if ("object" == typeof e) return t.extend(l, e);
		var i = l[e] || e,
			o = arguments;
		if (o.length > 1) for (var n = 1, a = o.length; a > n; n++) i = i.replace("{" + n + "}", o[n]);
		return i
	}
	var s = t.noop,
		r = {
			mode: "html5",
			action: "",
			fieldName: "Filedata",
			formData: null,
			multi: !1,
			auto: !0,
			showQueue: !0,
			showSpeed: "",
			fileSizeLimit: 0,
			fileTypeDesc: "",
			fileTypeExts: "",
			onInit: s,
			onClearQueue: s,
			onSelected: s,
			onCancel: s,
			onError: s,
			onStart: s,
			onProgress: s,
			onSuccess: s,
			onComplete: s,
			onAllComplete: s,
			onMouseOver: s,
			onMouseOut: s,
			onMouseClick: s,
			onAddQueue: function(e, t) {
				var o = 0 / 0 + n(e.name, 32) + 0 / 0 + i(e.size) + 0 / 0 + (t ? t.name : "") + 0 / 0;
				return o
			}
		},
		l = {
			600: "Installation error",
			601: 'Please select "{1}" format file',
			602: "The file size must be less than {1}"
		},
		u = {};
	(function(e) {
		var t, i, o, n = e.split(/,/);
		for (t = 0; n.length > t; t += 2) for (o = n[t + 1].split(/ /), i = 0; o.length > i; i++) u[o[i]] = n[t]
	})("image/x-icon,ico,image/bmp,bmp,image/gif,gif,image/jpeg,jpeg jpg jpe,image/photoshop,psd,image/png,png,image/svg+xml,svg svgz,image/tiff,tiff tif,text/plain,asc txt text diff log,text/html,htm html xhtml,text/xml,xml,text/css,css,text/csv,csv,text/rtf,rtf,audio/mpeg,mpga mpega mp2 mp3,audio/x-wav,wav,audio/mp4,m4a,audio/ogg,oga,audio/webm,webma,video/mpeg,mpeg mpg mpe,video/quicktime,qt mov,video/mp4,mp4,video/x-m4v,m4v,video/x-flv,flv,video/x-ms-wmv,wmv,video/avi,avi,video/ogg,ogv,video/webm,webmv,video/vnd.rn-realvideo,rv,application/msword,doc dot,application/pdf,pdf,application/pgp-signature,pgp,application/postscript,ps ai eps,application/rtf,rtf,application/vnd.ms-excel,xls xlb,application/vnd.ms-powerpoint,ppt pps pot,application/zip,zip,application/x-rar-compressed,rar,application/x-shockwave-flash,swf swfl,application/vnd.openxmlformats-officedocument.wordprocessingml.document,docx,application/vnd.openxmlformats-officedocument.wordprocessingml.template,dotx,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,xlsx,application/vnd.openxmlformats-officedocument.presentationml.presentation,pptx,application/vnd.openxmlformats-officedocument.presentationml.template,potx,application/vnd.openxmlformats-officedocument.presentationml.slideshow,ppsx,application/x-javascript,js,application/json,json,application/java-archive,jar war ear,application/vnd.oasis.opendocument.formula-template,otf,application/octet-stream,exe");
	var p = function() {};
	p.extend = function(e) {
		var t, i, o, n, a = this.prototype;
		"function" == typeof e && (e = e.call(a)), o = e.__construct, delete e.__construct, i = new this("!-");
		for (n in e) i[n] = e[n];
		return t = function() {
			"!-" !== arguments[0] && o && o.apply(this, arguments)
		}, i.constructor = t, i.__super = function(e, t) {
			return e ? a[e].apply(this, t) : a
		}, t.prototype = i, t.extend = arguments.callee, t
	};
	var d = p.extend(function() {
		function n(e, t, i) {
			var o = "progress" === t;
			this.type = t, this.timeStamp = +new Date, this.loaded = o ? e.loaded : 0, this.total = o ? e.total : 0, this.lengthComputable = o ? e.lengthComputable : !1, this.file = i
		}
		function s(e, t) {
			this.id = e, this.name = t.name, this.size = t.size, this.type = t.type ? 6 > t.type.length ? u[t.type] : t.type : u[t.name.split(".").pop()], this.lastModifiedDate = +t.lastModifiedDate, t.error && (this.error = t.error)
		}
		function r(e) {
			var t = e.code || +e.message,
				i = {
					600: "Installation Error",
					601: "Type Error",
					602: "Size Error"
				};
			t && (this.code = t, e.name = e.name || i[t] || "HTTP Error", e.message = e.message || t), e.file && (this.file = e.file), this.type = "error", this.name = a(e.name || "Error"), this.message = e.params ? a.apply(null, [e.message].concat(e.params)) : a(e.message)
		}
		function l(e) {
			for (var t = this.queue, i = t.length; i--;) if (t[i].id === e) return t[i]
		}
		function p(e) {
			var t = e.substr(e.lastIndexOf(".") + 1);
			return this.acceptExts[t]
		}
		function c(e, t) {
			return i(1e3 * (e - m) / (t - f)) + "/s"
		}
		function h(e) {
			var i = t("#" + this.id + "___" + this.loadId),
				o = i.find(".upload-progress");
			o.animate({
				width: e
			}, 200), i.find(".f-progress").text(e), "100%" === e && o.delay(2e3).fadeOut(800, function() {
				t(this).parent().remove()
			})
		}
		var f, m, v = {};
		return {
			init: function(e, i) {
				var o = this,
					n = t(e),
					a = o.opt,
					s = n.outerWidth();
				a.showSpeed && (o.$speed = t(a.showSpeed)), a.showQueue && ("string" == typeof a.showQueue ? o.$queuePanel = t(a.showQueue).addClass("upload-queue") : (n.after('<div class="upload-queue" id="' + o.id + '_queue"></div>'), o.$queuePanel = t("#" + o.id + "_queue"))), o.$btnProxy = t('<span class="upload-el"><div class="upload-btn-wrap" style="width:' + s + "px;height:" + n.outerHeight() + "px;margin-left:-" + s + 'px;">' + i + "</div></span>"), n.after(o.$btnProxy), o.el = t("#" + o.id)[0], o.$btn = n, o.speed = "", o.queue = [], o.acceptExts = function(e) {
					if ("*" === e) return e;
					var i = {};
					return t.each(e.split("|").join(",").split(","), function(e, t) {
						i[t] = 1
					}), i
				}(a.fileTypeExts), a.onInit.call(o)
			},
			start: function(e) {
				var t = this.queue;
				t.length ? t[0].error ? (t.shift(), this.start(!0)) : this.upload(t[0].id) : e && this.onAllComplete.call(this)
			},
			stop: function() {},
			remove: function(e) {
				this.$queuePanel && t("#" + this.id + "___" + e).delay(1e3).fadeOut(500).remove()
			},
			destroy: function() {
				this.$btn && this.$btn.removeAttr("data-uploader"), this.$btnProxy && this.$btnProxy.remove(), this.$queuePanel && this.$queuePanel.remove(), delete e[this.id]
			},
			getFile: function(e) {
				return this.validId(e) ? v[e] : null
			},
			validId: function(e) {
				for (var t = this.queue.length; t--;) if (this.queue[t].id === e) return !0
			},
			onSelected: function(e) {
				var i, n = this,
					a = n.opt,
					l = a.fileTypeExts.split("|").join(","),
					u = o(a.fileSizeLimit),
					d = "",
					c = e.length;
				n.queue = [], v = {}, t.each(e, function(e, t) {
					var o;
					return i = new s(+e, t), "*" === n.acceptExts || p.call(n, t.name) ? (u > 0 && i.size > u && (i.error = "Size Error", o = new r({
						code: 602,
						params: [a.fileSizeLimit.toUpperCase()],
						file: i
					}), n.onError(o, !1)), v[e] = t, n.queue[e] = i, n.$queuePanel && (d += '<div class="queue' + (e + 1 === c ? " last-queue" : "") + (o ? " upload-error" : "") + '" id="' + n.id + "___" + e + '">', d += a.onAddQueue.call(n, t, o) + "</div>"), void 0) : (n.onError({
						code: 601,
						params: [l]
					}, !1), void 0)
				}), n.$queuePanel && n.$queuePanel.html(d), a.onSelected.call(this, n.queue) !== !1 && a.auto && n.start()
			},
			onStart: function(e) {
				var t = this.queue[0];
				this.loadId = t.id, this.loadFile = t, e = new n(e, "loadstart", t), f = e.timeStamp - 1, m = 0, this.el.style.top = "1000px", d.uploading = !0, this.opt.onStart.call(this, e)
			},
			onProgress: function(e) {
				e = new n(e, "progress", this.loadFile), e.lengthComputable && (this.speed = c(e.loaded, e.timeStamp), this.$speed && this.$speed.text(this.speed), this.$queuePanel && h.call(this, (100 * (e.loaded / e.total)).toFixed(1) + "%"), f = e.timeStamp, m = e.loaded), this.opt.onProgress.call(this, e)
			},
			onCancel: function(e) {
				var i;
				t.each(this.queue, function(t, o) {
					return o.id === +e ? (i = t, !1) : void 0
				}), this.remove(e), this.opt.onCancel.call(this, this.queue.splice(i, 1))
			},
			onClearQueue: function() {
				this.queue = [], this.$queuePanel && (this.$queuePanel[0].innerHTML = ""), this.el.style.top = "", d.uploading = !1, this.opt.onClearQueue.call(this)
			},
			onError: function(e, i) {
				var o = this.opt,
					n = e.id || this.loadId || null,
					a = n ? e.file || l.call(this, n) : null;
				e.file = a, e = new r(e), o.language && e.code && o.language[e.code] && (e.message = o.language[e.code]), null !== n && (this.$queuePanel && t("#" + this.id + "___" + n).addClass("upload-error").find(".f-progress").text(e.name), i !== !1 && this.onComplete()), this.opt.onError.call(this, e)
			},
			onSuccess: function(e) {
				var t = new n(null, "load", this.loadFile);
				t.data = e, h.call(this, "100%"), this.opt.onSuccess.call(this, t), this.onComplete()
			},
			onComplete: function() {
				var e = new n(null, "loadend", this.queue.shift());
				this.opt.onComplete.call(this, e), this.start(!0)
			},
			onAllComplete: function() {
				v = {}, this.queue = [], this.loadId = 0, this.loadFile = null, this.el.style.top = "", d.uploading = !1, this.$speed && this.$speed.text(""), this.opt.onAllComplete.call(this)
			},
			onMouseOver: function() {
				this.$btn.addClass("upload-btn-over"), this.opt.onMouseOver.call(this, this.$btn)
			},
			onMouseOut: function() {
				this.$btn.removeClass("upload-btn-over"), this.opt.onMouseOut.call(this, this.$btn)
			},
			onMouseClick: function() {
				this.$btn.trigger("click"), this.opt.onMouseClick.call(this, this.$btn)
			}
		}
	});
	e.FormData && (new XMLHttpRequest).upload && (d.html5 = d.extend(function() {
		function e() {
			var e, t, i = [],
				o = n.opt.fileTypeExts.split("|").join(",").split(","),
				a = o.length;
			if (a) {
				for (e = 0; a > e; e++) t = o[e], u[t] && i.push(u[t]);
				return i.join(",")
			}
		}
		function i() {
			return n.xhr = n.xhr || new XMLHttpRequest, n.xhr
		}
		function o(e) {
			n[a[e.type]](e)
		}
		var n, a = {
			loadstart: "onStart",
			progress: "onProgress",
			error: "onError",
			load: "onSuccess",
			loadend: "onComplete"
		};
		return {
			__construct: function(e, t) {
				n = this, this.id = e, this.opt = t
			},
			create: function(t) {
				var i = '<input type="file" id="' + this.id + '" class="uploader" accept="' + e() + '"' + (this.opt.multi ? " multiple" : "") + ">";
				this.init(t, i)
			},
			upload: function(e) {
				var a, s, r, l = n.opt;
				r = n.getFile(e), r && (s = new FormData, s.append(l.fieldName, r), l.formData && t.each(l.formData, function(e, t) {
					s.append(e, t)
				}), a = i(), a.open(l.method || "POST", l.action, !0), a.onreadystatechange = function() {
					4 === a.readyState && (200 === a.status ? n.onSuccess(a.responseText) : n.onError({
						code: a.status
					}))
				}, a.upload.onloadstart = a.upload.onprogress = a.upload.onerror = o, t.each({
					"Cache-Control": "no-cache",
					"X-Requested-With": "XMLHttpRequest"
				}, function(e, t) {
					a.setRequestHeader(e, t)
				}), a.withCredentials = !0, a.send(s))
			},
			cancel: function(e) {
				var t = n.queue;
				if ("*" === e) n.xhr && n.xhr.readyState > 0 && n.xhr.abort(), n.onClearQueue();
				else {
					if (!t.length) return;
					e || (e = t[0].id), n.xhr && n.xhr.readyState > 0 && e === n.loadId && n.xhr.abort(), n.onCancel(e)
				}
			},
			destroy: function() {
				this.el && this.el.parentNode.removeChild(this.el), this.xhr = null, this.__super("destroy")
			}
		}
	})), r.swf = function() {
		var e, i = t('script[src*="uploader."]').attr("src");
		return void 0 === i && (i = ""), e = i.split("/").slice(0, -1).join("/"), e && (e += "/"), e + "uploader.swf"
	}(), r.preventCache = !0, d.flash = d.extend(function() {
		function i(e) {
			if (e.src) {
				var t = e.src + (-1 !== e.src.indexOf("?") ? "&" : "?") + "__=" + +new Date,
					i = "",
					o = {
						type: "application/x-shockwave-flash",
						width: "100%",
						height: "100%"
					},
					a = {
						wmode: "transparent",
						allowScriptAccess: "always"
					},
					s = function(e) {
						var t, i = "";
						for (t in e) i += " " + t + '="' + e[t] + '"';
						return i
					};
				if (function(t) {
					for (var i, n = t.length, s = {}; n--;) s[t[n]] = 1;
					for (i in e) s[i] ? o[i] = e[i] : a[i] = e[i]
				}("width height id class style".split(" ")), a.src = t, n) {
					o.codebase = "http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0", o.data = t, i += "<object" + s(o) + ">";
					for (var r in a) i += '<param name="' + r + '" value="' + a[r] + '">';
					i += "</object>"
				} else i += "<embed" + s(a) + s(o) + ">";
				return i
			}
		}
		function o(e) {
			n ? (e.style.display = "none", function() {
				if (4 === e.readyState) {
					for (var t in e)"function" == typeof e[t] && (e[t] = null);
					e.parentNode.removeChild(e)
				} else setTimeout(arguments.callee, 15)
			}()) : e.parentNode.removeChild(e)
		}
		var n = !! e.ActiveXObject,
			a = function() {
				var e, t, i = "ShockwaveFlash";
				if (n) try {
					e = new ActiveXObject(i + "." + i).GetVariable("$version"), e = e.split(" ")[1].split(",")[0]
				} catch (o) {} else t = navigator.plugins["Shockwave Flash"], "object" == typeof t && (e = t.description.split(" ")[2]);
				return parseInt(e, 10)
			}();
		return {
			__construct: function(e, t) {
				this.id = e, this.opt = t
			},
			swfVersion: a,
			create: function(e) {
				var o = this.opt,
					n = {
						id: this.id,
						path: function() {
							var e = location.pathname.split("/");
							return e.pop(), e.join("/") + "/"
						}(),
						action: o.action,
						field: o.fieldName,
						desc: o.fileTypeDesc,
						ext: o.fileTypeExts
					};
				o.multi && (n.multi = 1), o.debug && (n.debug = 1), o.method && (n.method = o.method), o.formData && (n.formData = t.param(o.formData)), (!a || 9 > a) && t(e).addClass("uploader-init-error"), this.init(e, i({
					src: o.swf,
					id: this.id,
					"class": "uploader",
					flashvars: t.param(n)
				}))
			},
			upload: function(e) {
				this.validId(e) && this.el.startUpload("" + e)
			},
			cancel: function(e) {
				var t = this.queue;
				t.length && (e || (e = t[0].id)), this.el.cancelUpload(e)
			},
			destroy: function() {
				o(this.el), this.__super("destroy")
			}
		}
	}), t(function() {
		var i = t("body"),
			o = ".uploader";
		i.on("change" + o, ":file.uploader", function() {
			e[this.id].onSelected(this.files)
		}).on("click" + o, ":file.uploader", function() {
			e[this.id].onMouseClick()
		}), i.on("mouseenter" + o, "div.upload-btn-wrap", function() {
			e[this.firstChild.id].onMouseOver()
		}).on("mouseleave" + o, "div.upload-btn-wrap", function() {
			e[this.firstChild.id].onMouseOut()
		}), i.on("click" + o, "a.upload-cancel", function(i) {
			var o = t(this).closest(".queue"),
				n = o.attr("id").split("___");
			o.hasClass("upload-error") ? o.remove() : e[n[0]].cancel(n[1]), i.preventDefault()
		})
	}), d.guid = 0, d.uploading = !1, d.defaults = r, d.mimes = u, d.lang = l, d.i18n = a, d.stringifySize = i, d.parseSize = o, d.getShortName = n, t.uploader = d, t.fn.uploader = function() {
		var i = arguments,
			o = t(this).attr("data-uploader");
		if (!i.length) return o ? e[o] : null;
		if ("string" == typeof i[0] && "on" !== i[0].substr(0, 2)) return o && e[o][i[0]].apply(e[o], i[1]), this;
		this.on("remove", function() {
			e[t(this).attr("data-uploader")].destroy()
		});
		var n = t.extend({}, r, i[0]);
		return n.fileTypeExts = n.fileTypeExts.replace(/ /g, ""), d[n.mode] || (n.mode = "flash"), this.each(function() {
			var i = "uploader_" + (n.id || d.guid++);
			t(this).attr("data-uploader", i), e[i] = new d[n.mode](i, n), e[i].create(this)
		})
	}, a({
		400: "(400)请求无效",
		404: "(404)请求的资源不存在",
		500: "(500)内部服务器错误",
		501: "(501)未执行",
		502: "(502)连接超时",
		600: "初始化上传发生错误",
		601: "请选择“{1}”格式的文件",
		602: "文件尺寸不能大于{1}"
	})
})(window, jQuery);