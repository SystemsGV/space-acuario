!(function (e) {
	e(document).ready(function () {
		var s,
			a = function (a, t, l) {
				var o = e(".notification-popup ");
				o.find(".task").text(a),
					o.find(".notification-text").text(t),
					o.removeClass("hide success"),
					l && o.addClass(l),
					s && clearTimeout(s),
					(s = setTimeout(function () {
						o.addClass("hide");
					}, 3e3));
			},
			t = function () {
				var s = e("#new-task").val();
				var t = e(".todo-list-body").prop("scrollHeight"),
					l = e(o).clone();
				l.find(".task-label").text(s),
					l.addClass("new"),
					l.removeClass("completed"),
					e("#todo-list").append(l),
					e("#new-task").val(""),
					a(s, "added to list"),
					e(".todo-list-body").animate({ scrollTop: t }, 1e3);
			},
			l = function () {
				e(".add-task-btn").toggleClass("hide"),
					e(".new-task-wrapper").toggleClass("visible"),
					e("#new-task").hasClass("error") &&
						(e("#new-task").removeClass("error"),
						e(".new-task-wrapper .error-message").addClass("hidden"));
			},
			o = e(e("#task-template").html());
		e(".add-task-btn").click(function () {
			var s = e(".new-task-wrapper").offset().top;
			e(this).toggleClass("hide"),
				e(".new-task-wrapper").toggleClass("visible"),
				e("#new-task").focus(),
				e("body").animate({ scrollTop: s }, 1e3);
		}),
			e("#new-task").keydown(function (s) {
				var a = s.keyCode,
					o = 13,
					n = 27;
				e("#new-task").hasClass("error") &&
					(e("#new-task").removeClass("error"),
					e(".new-task-wrapper .error-message").addClass("hidden")),
					a == o ? (s.preventDefault(), t()) : a == n && l();
			}),
			e("#add-task").click(t),
			e("#close-task-panel").click(l);
	});
})(jQuery);
