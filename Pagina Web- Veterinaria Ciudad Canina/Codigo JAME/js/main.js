let notification_icons = ["error", "warning", "check_circle", "info"];
let notification_types = ['error', 'warning', 'success', 'info', 'question'];
let notification_colors = ['danger', 'warning', 'success', 'info', ''];

var showNotifications = function (not) {
    App.notifications.showNotifications(not);
};

var form_modal = '';
var had_info = false;
var help_info = false;
var is_edit = false;
var validEdit = false;
var submit = null;
var ajaxPost = function (data, url, options) {
    App.ajaxPost(data, url, options);
};

var App = {
    init: function () {
        App.notifications.icons();
        $(".kt-dialog--loader").hide();
        $("#kt_wrapper").animate({ opacity: "1" }, 400);
        $(document).on("change", "input.form-control", function () {
            $(this).attr("value", this.value);
        });
        // ToDo: Refactor required
        $(document).on("change", "select[data-morphs='morphs']", function (e) {
            e.preventDefault();
            if (!this.value || this.disabled) {
                return false;
            }
            let el = $(this);
            let name = el.attr('name');
            let new_name = name.replace("_type", "_id");
            var new_elem = $("[name='" + new_name + "']");
            let className = new_name.replace(/[\[\]]/g, "");
            let selected = new_elem.attr('data-id');
            let element = new_elem;
            let parent_invisible = element.closest('.item-form');
            parent_invisible.find(".btn.dropdown-toggle.disabled.btn-light.bs-placeholder").remove();
            new_elem.selectpicker('destroy');
            let request = {
                url: el.attr('data-url'),
                model: "\\" + this.value,
                name: new_name,
                class: className
            };
            let condField = el.data('read-only');
            let data_name = el.data('name');
            if (condField != undefined) {
                let condFields = condField.toString().split("|");
                condFields.forEach(function (fieldName, index) {

                    let new_ele = name.replace(data_name, fieldName);
                    let meMorph = $("[name='" + new_ele + "']:not(:disabled)");

                    let readonly_value = el.data('read-only-value');
                    if (readonly_value != undefined) {
                        let values_readonly = readonly_value.toString().replaceAll("'", '"');
                        let jsonCondVals = (JSON.parse(values_readonly));
                        let validCondMorph = jsonCondVals.includes(el.val());
                        if (validCondMorph) {
                            meMorph.val(1);
                            meMorph.prop('readonly', validCondMorph);
                            meMorph.prop('required', true);
                        } else {
                            meMorph.prop('readonly', validCondMorph);
                        }
                    }
                });
            }
            parent_invisible.find('.form-group').css('filter', 'blur(3px)');
            parent_invisible.show().addClass("kt-spinner kt-spinner--v2 kt-spinner--info kt-spinner--center");
            $.ajax({
                url: request.url,
                type: 'post',
                dataType: 'JSON',
                data: $.extend(request, { _token: $("[name=_token]").val() }),
                success: function (r) {
                    if (r.view_options) {
                        element.prop('required', true);
                        element.empty();
                        element.append(r.options);
                        if ($.fn.selectpicker) {
                            element.selectpicker('refresh');
                        }
                        if (selected > 0) { 
                            element.val(selected); 
                            element.trigger('change'); 
                            element.removeAttr('data-id'); 
                        }

                        $('.div_' + r.class).html(r.links);
                        $('.label_' + r.class).html(r.label);
                    } else {
                        element.prop('required', false);
                        parent_invisible.hide();
                    }
                },
                complete: function() {
                    parent_invisible.find('.form-group').css('filter', '');
                    parent_invisible.removeClass("kt-spinner kt-spinner--v2 kt-spinner--info kt-spinner--center");
                },
                error: function (xhr) {
                    App.errorForm(xhr);
                },
            });

        });
        $(document).on('div', 'mousewheel DOMMouseScroll', function (e) {
            e.preventDefault();
            var e0 = e.originalEvent;
            var delta = e0.wheelDelta || -e0.detail;
            this.scrollTop += (delta < 0 ? 1 : -1) * 30;
        });
        App.events();
        $(document).on('click', '.recover_swal', function (e) {
            e.preventDefault();
            let ele = $(this);
            App.printValuesLocalStorage(ele.data('formid'));
            swal.close();
        });
        $(document).on('click', '.discard_swal', function (e) {
            e.preventDefault();
            let ele = $(this);
            App.deleteValuesLocalStorage('', ele.data('formid'));
            swal.close();
        });
        $(document).on('click', '.close_swal', function (e) {
            e.preventDefault();
            swal.close();
        });
        $(document).on('click', '.link-modal', function (e) {
            e.preventDefault();
            App.modal({ url: $(this).attr("href") }, $(this).data('callback'), $(this).data('type'), $(this).data('method'), $(this).data('rmodal'));
        });
        $(document).on('click', '.modal-backdrop.fade', function (e) {
            if (!$(this).hasClass('show')) {
                $(this).remove();
            }
        });
        $("#alert_buy").on('show.bs.dropdown', function () {
            var container = $(this).find('.buyform');
            if (!container.hasClass('loaded')) {
                App.loadView({
                    url: container.data('url')
                }, undefined, container);
                container.addClass('loaded');
            }
        });
        $(document).on('click', '.epayco-button-render', function () {
            $(this).prop('disabled', true);
            setTimeout(function () {
                $(".epayco-button-render").prop('disabled', false);
            }, 5000);
        });
        $(document).on('click', '[data-license-feature]', function (e) {
            if (PLAN_SERVICES.indexOf($(this).data("licenseFeature")) < 0) {
                e.preventDefault();
                e.stopPropagation();
                App.payFeature($(this).data("licenseFeature"));
            }
        });
        $(document).on('change', '[data-vexists]', function () {
            let el = $(this);
            if (el.data("vtimer")) {
                clearTimeout(el.data("vtimer"));
            }
            if (!el.val() || el.val().length < 4 || !el.valid()) {
                return;
            }
            el.data("vtimer", setTimeout(() => {
                App.validateOwnerExists(el);
            }, 1000));
        });

        window.onbeforeunload = function (e) {
            let modall = $('#modal');
            if (modall.hasClass('show') && submit != 1) {
                let form = modall.find('form');
                if (form.length > 0) return __("Desea cargar la pagina");
            }
            App.loading(true);
        };

        //función para escuchas todos los eventos de todos los elementos de un formulario
        $(document).on("change", '#modal form *', function () {
            if (!is_edit && validEdit) {
                let el = $(this);
                let form = el.closest('form');
                let type = el.prop("tagName");
                let formId = App.idLocalStorage(form)
                let key = formId + el.attr('name');
                if (type == "INPUT") {
                    let typ = el.attr('type');
                    if (typ == 'checkbox') {
                        if (el.is(':checked')) {
                            localStorage.setItem(key, el.val())
                        } else {
                            localStorage.setItem(key, 0)
                        }
                    } else if (typ != 'file') {
                        if (el.val()) {
                            localStorage.setItem(key, el.val())
                        } else {
                            localStorage.removeItem(key);
                        }
                    }
                }
                if (type == "SELECT") {
                    setTimeout(() => {
                        if (el.val() != null && el.val() != 0 && !is_edit || (el.val() && localStorage.getItem(key) && help_info)) {
                            localStorage.setItem(key, el.val());
                        }
                    }, 300);
                }
                if (type == "TEXTAREA") {
                    if (el.val()) {
                        localStorage.setItem(key, el.val())
                    } else {
                        localStorage.removeItem(key);
                    }
                }
            }

        });

        // función para escuchar los botones tipo submit que enviar el formulario
        $(document).on("click", 'button[type=submit]', function () {
            submit = 1;
        });

        $(window).on('pageshow', function () {
            App.loading(false);
        });
        if ($('.helpcenter').length && typeof (Storage) !== "undefined" && localStorage.removeItem("helpcenter") === null) {
            setTimeout(function () {
                $('.helpcenter').tooltip('show');
                setTimeout(function () {
                    $('.helpcenter').tooltip('hide');
                    localStorage.setItem("helpcenter", true);
                }, 10000);
            }, 1000);
        }
        if ($('[data-autotooltip]').length && typeof (Storage) !== "undefined") {
            $('[data-autotooltip]').each(function () {
                let el = $(this);
                let ident = el.data('autotooltip');
                if (localStorage.getItem(`autotooltip_${ident}`) == null) {
                    el.tooltip('show');
                    setTimeout(function () {
                        el.tooltip('hide');
                        localStorage.setItem(`autotooltip_${ident}`, new Date());
                    }, 10000);
                }
            });
        }
        $(".show-now:first").trigger('click');
        $("#userDropdown").on('show.bs.dropdown', function () {
            App.pushWeb.check();
        });
        if ("serviceWorker" in navigator) {
            window.addEventListener("load", function () {
                navigator.serviceWorker.register("/sw.js");
            });
        }
    },
    events: function (view) {
        $('[data-rel="tooltip"]').tooltip();
        $('[data-switch=true]:not(.srd)').bootstrapSwitch().addClass('srd');
        $("[data-json]").on('change', function () {
            App.utils.json.update(this);
        });
        $("[data-json='']").each(function () {
            App.utils.json.load(this);
        });
        if (view != undefined) {
            view.find("[data-toggle='tooltip']").tooltip();
        }

        if ($("[type=datetime-local]:first").length) {
            if ($("[type=datetime-local]:first").prop('type') == "text") {
                $("[type=datetime-local]:not(.dtpready)").datetimepicker().addClass('dtpready');
            }
        }
        App.notifications.icons();
    },
    notifications: {
        notifyIcons: ["icon flaticon-cancel", "icon flaticon-danger", "icon flaticon2-checkmark", "icon flaticon-information"],
        showNotifications: function (not) {
            if (not == null || not == undefined) {
                return;
            }
            for (var i = 0; i < not.length; i++) {
                if ((not[i].swal ?? false) || (not[i][0] ?? 0 == 3)) {
                    let notify = not[i];
                    swal.fire($.extend({
                        title: not[i].title ?? not[i][2],
                        html: not[i].text ?? not[i][3],
                        type: not[i].type ?? notification_types[not[i][1]] ?? ""
                    }, not[i].swalOptions ?? {})).then(result => {
                        if (result.value && (notify.callback ?? false)) {
                            if (typeof notify.callback == "function") notify.callback(notify.data ?? {});
                            else App.executeFunctionByName(notify.callback, window, notify.data ?? {});
                        }
                    });
                } else {
                    $.notify({
                        icon: App.notifications.notifyIcons[(not[i].type ?? false) ? notification_types.indexOf(not[i].type) : not[i][1]],
                        title: not[i].title ?? not[i][2],
                        message: not[i].text ?? not[i][3] ?? ""
                    }, {
                        type: notification_colors[(not[i].type ?? false) ? notification_types.indexOf(not[i].type) : not[i][1]],
                        timer: 3000,
                        z_index: 1051,
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        animate: {
                            enter: 'animated slideInRight',
                            exit: 'animated slideOutRight'
                        }
                    });
                    if (not[i].callback ?? false) {
                        if (typeof not[i].callback == "function") not[i].callback(not[i].data ?? {});
                        else App.executeFunctionByName(not[i].callback, window, not[i].data ?? {});
                    }
                }
            }
        },
        icons: function () {
            $("[data-icon-code]").each(function () {
                $(this).html(notification_icons[$(this).data('icon-code')]);
            });
        }
    },
    loadView: function (data, callback, view) {
        var view = (view == undefined) ? $("#view_" + data['url']) : view;
        $.ajax({
            url: data['url'],
            type: data['method'] ?? 'post',
            dataType: 'JSON',
            data: $.extend(data, { _token: $("[name=_token]").val() }),
            success: function (r) {
                if (r.reload) {
                    window.location.reload();
                } else {
                    aux = r;
                    try {
                        showNotifications(r.notifications);
                    } catch (e) {
                        console.log(e);
                    }
                    if (r.html == undefined || r.html == "") {
                        if (typeof callback == "function") callback(r);
                        else App.executeFunctionByName(callback, window, r);
                        return false;
                    }
                    view.hide().html(r.html).slideDown();
                    setTimeout(function () {
                        view.find(".selectpicker:not(:disabled)").selectpicker();
                        view.find('.datepicker').datepicker();
                    }, 400);
                    App.events(view);
                    KTApp.init();
                    if (typeof callback == "function") callback(r);
                    else App.executeFunctionByName(callback, window, r);
                }
            },
            error: function (data) {
                showNotifications([
                    [3, 0, __("Error"), __("No se ha podido cargar el contenido, verifica tu conexión")]
                ]);
                console.log(data);
            }
        });
    },
    last_modal: null,
    modal: function (data, callback, type, method, remember_last) {
        $("body>.dropdown-menu").remove();
        var last_setup = App.last_modal;
        if (remember_last && $('#modal:visible').length > 0 && last_setup) {
            $('#modal').on('hidden.bs.modal', function (e) {
                $(this).off('hidden.bs.modal');
                App.modal(last_setup[0], last_setup[1], last_setup[2], last_setup[3], false);
            });
        }
        App.last_modal = arguments;
        var modal = $('#modal');
        $('.tooltip').remove();
        modal.find(".modal-body,.modal-title").html("");
        modal.find(".modal-header,.modal-body").hide();
        modal.find(".loading").show();
        modal.find(".modal-dialog").removeClass("modal-lg modal-sm modal-md modal-xl modal-xxl");
        if (type != undefined) {
            modal.find(".modal-dialog").addClass(type);
        }
        setTimeout(function () {
            modal.modal({ backdrop: 'static', keyboard: false }).modal("show");
        }, $("#modal:visible").length > 0 ? 400 : 1);
        $.ajax({
            url: data.url,
            type: method ? method : 'post',
            dataType: 'JSON',
            data: ((method ? method : 'post').toLowerCase() == 'post' ? $.extend(data, { _token: $("[name=_token]").val() }) : data),
            success: function (r) {
                aux = r;
                if (r.redirect) {
                    window.location.href = r.redirect;
                }
                try {
                    showNotifications(r.notifications);
                } catch (e) {
                    console.log(e);
                }
                if (r.html == undefined || r.html == "") {
                    if (typeof callback == "function") callback(r);
                    else App.executeFunctionByName(callback, window, r);
                    setTimeout(function () {
                        modal.modal("hide");
                    }, modal.is(":visible") ? 1 : 400);
                    return false;
                }
                modal.find(".loading").hide();
                modal.find(".modal-title").html(r.title).parent('.modal-header').fadeIn();
                modal.find(".modal-body").html(r.html);
                setTimeout(function () {
                    var modalBody = modal.find(".modal-body");
                    modal.find(".selectpicker:not(:disabled)").selectpicker();
                    modal.find('.datepicker').datepicker();
                    if (modalBody.find(".modal-footer").length > 0) {
                        modalBody.css({ "padding-bottom": "0px" });
                    } else {
                        modalBody.css({ "padding-bottom": "15px" });
                    }
                    modalBody.slideDown();
                }, 500);
                App.events(modal);
                KTApp.init();
                // modal.find(".oneClick").trigger( "click" );

                //función para verificar que valores hay en el localStorage y llenarlo en el formulario
                validEdit = false;
                setTimeout(() => {
                    App.getItemLocalStorage(modal)
                }, 500);

                if (typeof callback == "function") callback(r);
                else App.executeFunctionByName(callback, window, r);
            },
            error: function (data) {
                console.debug(data);
                let not = {
                    title: __("Error") + " " + (data?.status ?? ''),
                    text: __("No se ha podido cargar el contenido, verifica tu conexión o recarga la página."),
                    type: 'warning',
                    swal: true,
                }
                if (data.responseJSON && data.responseJSON.message) {
                    not["text"] = data.responseJSON.message;
                }
                let feature = data.getResponseHeader('feature') ?? "";

                if (feature == 'workshift') {
                    not['swalOptions'] = {
                        confirmButtonText: __('Ir a abrir turno'),
                        cancelButtonText: __('Cancelar'),
                        showCancelButton: true,
                    };
                    not['callback'] = function() {
                        setTimeout(function(){
                            $("#headerWorkshift [data-toggle=dropdown]").trigger('click');
                        }, 200);
                    };
                }

                // Pago requerido
                if ((data?.status ?? '') == 402) {
                    not['title'] = data.getResponseHeader('title') ?? __('Has alcanzado el límite de uso de la versión gratis de OkVet');
                    not["callback"] = 'window.open';
                    not["data"] = '/Veterinaria/Suscripción?feature=' + feature;
                    not["swalOptions"] = {
                        confirmButtonText: __('Ver planes'),
                    };
                    if (feature) {
                        App.sendGTag('payFeature', {'feature': feature});
                    }
                }
                showNotifications([not]);
                setTimeout(function () {
                    modal.modal("hide");
                }, 500);
            },
        });
    },
    modalShow: function (title = '', body = '', footer = '', sizeClass = '') {
        var modal = $('#modal');
        $('.tooltip').remove();
        modal.find(".modal-body,.modal-title").html("");
        modal.find(".modal-body,.modal-footer").html("");
        modal.find(".modal-header,.modal-body").hide();
        modal.find(".loading").show();
        modal.find(".modal-dialog").removeClass("modal-lg modal-sm modal-md modal-xl");
        if (sizeClass != '') {
            modal.find(".modal-dialog").addClass(sizeClass);
        }
        setTimeout(function () {
            modal.modal({ backdrop: 'static', keyboard: false }).modal("show");
        }, $("#modal:visible").length > 0 ? 400 : 1);
        modal.find(".loading").hide();
        modal.find(".modal-title").html(title).parent('.modal-header').slideDown();
        modal.find(".modal-body").html(body).slideDown();
        if (footer != '') {
            modal.find(".modal-content").append(`
                    <div class="modal-footer">
                        ${footer}
                    </div>
                `).slideDown();

        }
        App.events(modal);
    },
    scrollEnd: function (minus = 0, top = false) {
        if (top) {
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        } else {
            $('html, body').animate({
                scrollTop: $(document).height() - minus
            }, 'slow');
        }

    },
    ajaxPost: function (data, url, options, ajax, container = null) {
        var f = document.createElement("form");
        f.setAttribute('method', "POST");
        f.setAttribute('action', (url != undefined) ? url : "");
        if (options !== undefined) {
            for (var x in options) {
                f.setAttribute(x, options[x])
            }
        }
        var id = Math.floor(Math.random() * 99999);
        f.setAttribute('id', "post_" + id);
        var obj = {};
        data = $.extend(data, { _token: $("[name=_token]").val() });
        for (var x in data) {
            if (data.hasOwnProperty(x)) {
                if (Array.isArray(data[x])) {
                    for (var y in data[x]) {
                        obj[x] = document.createElement("input");
                        obj[x].setAttribute('type', "hidden");
                        obj[x].setAttribute('name', x + "[]");
                        obj[x].setAttribute('value', data[x][y]);
                        f.appendChild(obj[x]);
                    }
                } else {
                    obj[x] = document.createElement("input");
                    obj[x].setAttribute('type', "hidden");
                    obj[x].setAttribute('name', x);
                    obj[x].setAttribute('value', data[x]);
                    f.appendChild(obj[x]);
                }
            }
        }
        if (options == undefined || options.target == undefined) {
            $(".kt-dialog--loader").show();
            $("#kt_wrapper").animate({ opacity: "0" }, 400);
        }
        document.getElementsByTagName('body')[0].appendChild(f);
        if (ajax) {
            var form = $("#post_" + id);
            form.append("<button type='submit'>");
            App.ajaxForm(form, ajax, container);
            form.find('button[type=submit]').trigger('click');
            // Eliminar formulario temporal
            setTimeout(function() {
                form.remove();
            }, 400);
        } else {
            document.getElementById("post_" + id).submit();
        }
    },
    utils: {
        json: {
            update: function (el) {
                var to = $(el).data("json");
                var attr = $(el).data("attribute");
                if (attr == undefined) {
                    return false;
                }
                var val = $(el).val();
                var r = $("#" + to).val();
                var json = {};
                try {
                    json = Object.assign({}, JSON.parse(r));
                } catch (e) { }
                json[attr] = val;
                $("#" + to).val(JSON.stringify(json)).change();
            },
            load: function (el) {
                var id = $(el).attr("id");
                var r = $(el).val();
                var json = {};
                try {
                    json = JSON.parse(r);
                } catch (e) { }
                for (var x in json) {
                    $("[data-json='" + id + "'][data-attribute='" + x + "']").val(json[x]).change();
                }
            }
        }
    },
    loading: function (active) {
        if (active === false) {
            $(".kt-dialog--loader").hide();
            $("#kt_wrapper").animate({ opacity: "1" }, 400);
        } else {
            $(".kt-dialog--loader").show();
            $("#kt_wrapper").animate({ opacity: "0" }, 400);
        }
    },
    editor: function (id) {
        CKEDITOR.inline(id, {
            allowedContent: true,
            toolbarGroups: [
                { "name": "basicstyles", "groups": ["basicstyles"] },
                { "name": "links", "groups": ["links"] },
                { "name": "paragraph", "groups": ["list", "blocks"] },
                { "name": "document", "groups": ["mode"] },
                { "name": "styles", "groups": ["styles"] }
            ],
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar',
            extraPlugins: 'easyimage',
            cloudServices_tokenUrl: CP,
            cloudServices_uploadUrl: CP
        });
    },
    errorForm: function (xhr, container) {
        container = container == undefined ? $("#modal .modal-body") : container;
        container.find(".error.invalid-feedback,.alert-validation").remove();
        container.find(".is-invalid").removeClass('is-invalid');
        if (xhr.responseJSON && xhr.responseJSON.message) {
            showNotifications([{
                type: 'error',
                swal: true,
                title: 'Error',
                text: xhr.responseJSON.message
            }]);
        }
        if (xhr.responseJSON && xhr.responseJSON.errors) {
            for (var x in xhr.responseJSON.errors) {
                var name = x.replace(/\.([\w\-]+)/gm, '\[$1\]');
                var item = container.find(`[name='${name}']`);
                if (item.length > 0) {
                    item.addClass('is-invalid').after(`<span class="error invalid-feedback" role="alert"><strong>${xhr.responseJSON.errors[x].join('<br>')}</strong></span>`);
                } else {
                    container.prepend(`<div class="alert alert-danger alert-validation">\
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\
                            <i class="la la-times"></i>\
                        </button><span>${xhr.responseJSON.errors[x].join('<br>')}</span>\
                    </div>`);
                }
            }
        }
    },
    form_mail: function (subject, message, ids) {
        App.modal({
            inscriptions: ids,
            subject: subject,
            message: message,
            url: 'Evento/Notificacion'
        }, function () {
            $("#to").tagsinput({
                tagClass: function (item) {
                    return item.v === undefined ? 'badge badge-info' : (item.v ? 'badge badge-success' : 'badge badge-warning');
                },
                itemValue: 'e',
                itemText: 'e'
            });
            for (var x in destinatarios) {
                $("#to").tagsinput('add', destinatarios[x]);
            }
            var last_title = $("#modal").find(".modal-title").html();
            $("#form_notification").ajaxForm({
                beforeSubmit: function (data) {
                    var items = $("#to").tagsinput('items');
                    for (var x in items) {
                        data.push({ name: 'to[]', value: items[x].e });
                    }
                    $("#modal").find(".modal-title").html("Enviando...");
                    $("#modal").find(".modal-body").slideUp();
                },
                complete: function (xhr) {
                    var json = xhr.responseJSON;
                    if (json.notifications) {
                        showNotifications(json.notifications);
                    }
                    if (json.data.length > 0) {
                        $("#modal").find(".modal-title").html(last_title);
                        $("#modal").find(".modal-body").slideDown();
                        showNotifications([
                            [0, 1, "Envio parcial", "Algunos destinatarios pudieron no haber recibido el email"]
                        ]);
                        console.log(json.data);
                    } else {
                        $("#modal").modal('hide');
                    }
                },
                error: function (xhr) {
                    App.errorForm(xhr);
                    $("#modal").find(".modal-title").html(last_title);
                    $("#modal").find(".modal-body").slideDown();
                }
            });
        }, 'modal-lg');
    },
    add_notification_email: function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if (re.test(String(email).toLowerCase())) {
            $("#to").tagsinput('add', { e: email });
        } else {
            bootbox.alert("Email inválido");
        }
    },
    notification_confirm: function () {
        bootbox.confirm({
            'title': 'Enviar la notificación',
            'message': 'Se le enviará la notificación a los detinatarios, ¿Desea continuar?',
            buttons: {
                confirm: {
                    label: '<i class="material-icons">send</i> Enviar',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Regresar',
                    className: 'btn-default'
                }
            },
            callback: function (c) {
                if (c) {
                    $("#form_notification").submit();
                }
            }
        });
        return false;
    },
    ajaxForm: function (el, options, custom_container) {
        var container = custom_container ?? $('#modal');
        return el.ajaxForm({
            dataType: 'json',
            beforeSerialize: function (data) {
                if (options && options.beforeSerialize) {
                    return options.beforeSerialize(data);
                }
            },
            beforeSubmit: function (data) {
                container.find(".loading").show();
                container.find(".modal-body,.modal-header").slideUp();
                if (options && options.beforeSubmit) {
                    options.beforeSubmit(data);
                }
            },
            complete: function (xhr) {
                var json = xhr.responseJSON;
                if (json.url ?? false) {
                    App.deleteValuesLocalStorage(json.url);
                }
                if (json.notifications) {
                    showNotifications(json.notifications);
                }
                if (!json || !json.success) {
                    container.find(".loading").hide();
                    container.find(".modal-body,.modal-header").slideDown();
                } else {
                    container.modal('hide');
                }
                if (options && options.complete) {
                    options.complete(json);
                }
                App.loading(false);
            },
            error: function (xhr) {
                App.errorForm(xhr, custom_container);
                container.find(".loading").hide();
                container.find(".modal-body,.modal-header").slideDown();
                if (options && options.error) {
                    options.error(xhr);
                }
            }
        });
    },
    executeFunctionByName: function (functionName, context /*, args */) {
        if (functionName == undefined) return false;
        var args = Array.prototype.slice.call(arguments, 2);
        var namespaces = functionName.split(".");
        var func = namespaces.pop();
        for (var i = 0; i < namespaces.length; i++) {
            context = context[namespaces[i]];
        }
        return context[func].apply(context, args);
    },
    stringToHslColor: function (str, s, l) {
        var hash = 0;
        for (var i = 0; i < str.length; i++) {
            hash = str.charCodeAt(i) + ((hash << 5) - hash);
        }

        var h = hash % 360;
        return 'hsl(' + h + ', ' + s + '%, ' + l + '%)';
    },
    getFirstLetters: function (text, glue) {
        if (typeof glue == "undefined") {
            var glue = true;
        }

        var iniciales = text.replace(/[^a-zA-Z- ]/g, "").match(/\b\w/g);

        iniciales = iniciales ?? ["-"];

        if (glue) {
            return iniciales.join('');
        }

        return iniciales;
    },
    capitalize: function (text) {
        return text.toLowerCase().replace(/\b\w/g, function (m) {
            return m.toUpperCase();
        });
    },
    ckPreview: function () {
        CKEDITOR.inline(document.getElementById('ckpreview'), {
            extraPlugins: ['panelbutton', 'justify', 'colorbutton', 'autogrow', 'embed', 'autoembed'],
            embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
        });
    },
    modalAjax: function () {
        if ($("#modal form").length) {
            App.ajaxForm($("#modal form"));
        }
    },
    payFeature: (feature) => {
        $.ajax({
            type: 'GET',
            url: SP + '/SubscriptionDemoInfo',
            dataType: 'json',
            data: {
                feature: feature,
            },
            beforeSend: function () {
                swal.fire({
                    html: `<div class="d-flex justify-content-center"><div class="kt-spinner kt-spinner--md kt-spinner--info mr-5"></div> ${__('Cargando')}...</div>`,
                    showConfirmButton: false,
                });
            },
            success: function (json) {
                swal.close();
                swal.fire($.extend(json, {
                    buttonsStyling: false,
                    showCancelButton: true,
                    cancelButtonText: `${__('En otra ocasión')}`,
                    cancelButtonClass: 'btn btn-default',
                    showConfirmButton: true,
                    confirmButtonText: `<i class="fa fa-check"></i> ${__('Ver planes')}`,
                    confirmButtonClass: 'btn btn-outline-success',
                    showCloseButton: true,
                })).then((result) => {
                    if (result.value) {
                        let url = new URL(URL_LICENSE);
                        url.searchParams.append("feature", feature);
                        url.searchParams.append("plan", 3);
                        window.open(url.toString(), '_blank').focus();
                    }
                });
            },
            error: function () {
                swal.close();
                return false;
            }
        });
        App.sendGTag('payFeature', {'feature': feature});
    },
    sendGTag: function (eventName, data = {}) {
        gtag('event', eventName, $.extend(data, {
            'vet': VET_INFO ? `${VET_INFO.id} - ${VET_INFO.name}` : null,
            'user': USER_INFO ? `${USER_INFO.id} - ${USER_INFO.name}` : null,
        }));
    },
    validateOwnerExists: (el) => {
        let container = el.closest('.existsvalidate');
        $.ajax({
            url: SP + '/OwnerExists',
            type: 'GET',
            dataType: 'json',
            data: {
                name: el.data('vexists'),
                value: el.val(),
                id: $("#frmOwner [name=id]").val(),
            },
            beforeSend: () => {
                container.addClass('validating');
            },
            success: (json) => {
                if (json.success && json.count > 0) {
                    swal.fire({
                        title: json.title,
                        html: `<div class="alert alert-outline-warning" alert="role"><div class="alert-text">${__('El registro que intentas agregar ya existe en OkVet, selecciona un registro para vincularlo.')}</div></div>\
                        <div class="table-responsive">\
                            <table class="table">\
                                <thead>\
                                    <tr><th>${__('Nombre')}</th><th>${__('Identificación')}</th><th>${__('Móvil')}</th><th>${__('Email')}</th><th></th></tr>\
                                </thead>\
                                <tbody>\
                                    ${json.duplicates.map((own) => {
                            return `<tr><td>${own.name}</td><td>${own.number_doc}</td><td>${own.mobile ?? __('N/D')}</td><td>${own.email ?? __('N/D')}</td><td>\
                                        ${own.authorized
                                    ? `<button class="btn btn-success btn-sm m-0" type="button" onclick="owner.duplicateAction('select', '${own.id}', '${own.number_doc}')"><i class="la la-check-circle"></i> ${__('Seleccionar')}</button>`
                                    : `<button class="btn btn-primary btn-sm m-0" type="button" onclick="owner.duplicateAction('link', '${own.id}')"><i class="la la-link"></i> ${__('Vincular')}</button>`}\
                                            </td></tr>`;
                        }).join("\n")}
                                </tbody>\
                            </table>\
                        </div>`,
                        type: 'warning',
                        customClass: {
                            container: 'swal-autowidth'
                        }
                    });
                }
            },
            complete: () => {
                container.removeClass('validating');
            }
        });
    },
    /**
     * Get value by dot notation path string and to prevent undefined
     * errors
     * @param path String Dot notation path in string
     * @param object Object to iterate
     * @returns {*}
     */
    getObject: function (path, object) {
        return path.split('.').reduce(function (obj, i) {
            return obj !== null && typeof obj[i] !== 'undefined' ? obj[i] : null;
        }, object);
    },
    handleEvent: function (record, openForm = false) {
        if (record.id && record.date) {
            if (record.type == "notify") {
                swal.fire({
                    title: __('Información'),
                    text: record.text,
                    type: 'info',
                    buttonsStyling: false,
                    confirmButtonText: '<i class="fa fa-calendar"></i>' + __('Ver en la agenda'),
                    confirmButtonClass: "btn btn-info",
                    showCancelButton: true,
                    cancelButtonText: __('Cerrar'),
                    cancelButtonClass: "btn btn-default"
                }).then((result) => {
                    if (result.value) {
                        document.location.href = record.url;
                    }
                });
            } else {
                swal.fire({
                    title: __('Confirmación'),
                    text: record.text,
                    type: "question",
                    buttonsStyling: false,
                    confirmButtonText: record.type == "update" ? __('Si, actualizar') : __('Si, crear'),
                    confirmButtonClass: "btn btn-warning",
                    showCancelButton: true,
                    cancelButtonText: __('No, cancelar'),
                    cancelButtonClass: "btn btn-default"
                }).then((result) => {
                    if (result.value) {
                        App.ajaxPost(record.data, record.url, {}, {
                            complete: () => {
                                if (openForm) {
                                    consult.vetForm.handleForm(openForm);
                                }
                            }
                        });
                    } else {
                        if (openForm) {
                            consult.vetForm.handleForm(openForm);
                        }
                    }
                });
            }
        }
    },
    idLocalStorage: function (form, url = null) {
        // función para obtener el id único por cada formulario y guardar en el localStorage
        let action = '';
        if (url != null) {
            action = url;
        } else {
            action = form.attr('action');
        }
        var URLdomain = window.location.host
        let nam = action.split(URLdomain);
        let name1 = null;
        if (nam.length > 1) {
            name1 = nam[1].replace(/\//g, "");
        }

        return name1;
    },
    isEdit: function (modal) {
        //función para validar en el local storage si existe un valor previamente guardado
        let form = modal.find('form');

        is_edit = false;
        validEdit = true;
        // validando si es edicion
        form.find('*').each(function () {
            let ell = $(this);
            let ttype = ell.prop("tagName");

            if (ttype == "INPUT") {
                let typ = ell.attr('type');
                if (typ != undefined) {
                    if (typ !== 'hidden' && typ !== 'checkbox' && !typ.includes('date')) {
                        if (ell.val() != null && ell.val() != '') {
                            is_edit = true;
                        }
                    }
                }
            }
            if (ttype == "TEXTAREA") {
                if (ell.val() != null && ell.val() != '') {
                    is_edit = true;
                }
            }
        });

        return is_edit;
    },
    hadInfo: function (modal) {
        //función para validar en el local storage si existe un valor previamente guardado
        let form = modal.find('form');
        had_info = false;

        let formId = App.idLocalStorage(form)
        // validando si es edición
        form.find('*').each(function () {
            let ell = $(this);
            let key = formId + ell.attr('name');
            let ttype = ell.prop("tagName");

            if (ttype == "INPUT") {
                let typ = ell.attr('type');
                if (typ != undefined) {
                    if (typ !== 'hidden' && typ !== 'checkbox' && !typ.includes('date')) {
                        if (localStorage.getItem(key)) {
                            had_info = true;
                        }
                    }
                }
            }
            if (ttype == "TEXTAREA") {
                if (localStorage.getItem(key)) {
                    had_info = true;
                }
            }
        });

        return had_info;
    },
    getItemLocalStorage: function (modal) {
        //función para validar en el local storage si existe un valor previamente guardado
        form_modal = modal.find('form');
        if (form_modal.length == 0 || form_modal.hasClass('no-local-store')) {
            return false;
        }
        let formId = App.idLocalStorage(form_modal)
        edit = App.isEdit(modal);
        // validando si es edición

        let hadInf = App.hadInfo(modal);
        if (!edit && hadInf) {
            help_info = false;
            swal.fire({
                title: __('Información no guardada'),
                type: "question",
                html: `<p>${__('Se encontró información no guardada para este formulario, ¿desea recuperarla?')}<p>
                        <br>
                        <button type="button" data-formid="${formId}" class="btn btn-success recover_swal">${__('Si, recuperar')}</button>
                        <button type="button" data-formid="${formId}" class="btn btn-warning discard_swal">${__('No, descartar')}</button>
                        <button type="button" class="btn btn-default close_swal">${__('Cancelar')}</button>
                
                `,
                showConfirmButton: false,
            });
        }

    },
    deleteValuesLocalStorage: function (url, id = null) {
        let formId = '';
        if (id != null) {
            formId = id;
        } else {
            formId = App.idLocalStorage(null, url);
        }

        for (var i = 0; i < localStorage.length; i++) {
            let keyy = localStorage.key(i);
            setTimeout(() => {
                if (keyy.includes(formId)) {
                    localStorage.removeItem(keyy);
                }
            }, 100);

        }
    },
    printValuesLocalStorage: function (formId) {
        help_info = true;
        form_modal.find('*').each(function () {
            let el = $(this);
            let type = el.prop("tagName");

            let key = formId + el.attr('name');
            if (type == "INPUT" && localStorage.getItem(key)) {
                let typ = el.attr('type');
                if (typ == 'checkbox') {
                    if (localStorage.getItem(key) != 0) {
                        el.prop('checked', true)
                    } else {
                        el.prop('checked', false)
                    }
                } else {
                    if (localStorage.getItem(key)) {
                        el.val(localStorage.getItem(key))
                    }
                }
            }
            if (type == "SELECT" && localStorage.getItem(key)) {
                el.val(localStorage.getItem(key));
                el.change();
            }
            if (type == "TEXTAREA" && localStorage.getItem(key)) {
                el.val(localStorage.getItem(key))
            }
        });
    },
    pushWeb: {
        subscribe: function (sub, vetId) {
            const key = sub.getKey('p256dh')
            const token = sub.getKey('auth')
            const contentEncoding = (PushManager.supportedContentEncodings || ['aesgcm'])[0]

            const data = {
                endpoint: sub.endpoint,
                public_key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
                auth_token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null,
                encoding: contentEncoding,
            };

            fetch('/Notifications/Subscribe', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        localStorage.setItem(`enableNotifications`, vetId);
                    }
                    if (data && data.notifications) {
                        showNotifications(data.notifications);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        },
        getSubscription: function (vetId) {
            if (localStorage.getItem(`disableNotifications_${vetId}`) == null && Notification) {
                navigator.serviceWorker.ready.then(registration => {
                    registration.pushManager.getSubscription().then(subscription => {
                        if (subscription) {
                            return subscription;
                        }
                    }).then(subscription => {
                        if (!subscription || localStorage.getItem(`enableNotifications`) != vetId) {
                            if (Notification.permission == "denied") {
                                swal.fire({
                                    'type': 'warning',
                                    'title': __('Has bloqueado las notificaciones del navegador'),
                                    'html': `${__('Habilita o restablece el permiso de notificaciones para este sitio.')}<br>\
                                        <a href="https://support.google.com/chrome/answer/114662?hl=es-419" target="_blank">${__('Guía Google Chrome')}</a>`
                                });
                                return;
                            }
                            swal.fire({
                                type: 'question',
                                title: __('¿Desea recibir las notificaciones de la veterinaria en este dispositivo?'),
                                text: __('Recibirás notificaciones relacionadas a solicitudes de historias clínicas, agendamiento y novedades aunque no estés usando el sistema.'),
                                buttonsStyling: false,
                                showCancelButton: true,
                                cancelButtonText: `${__('En otra ocasión')}`,
                                cancelButtonClass: 'btn btn-default',
                                showConfirmButton: true,
                                confirmButtonText: `<i class="fa fa-check"></i> ${__('Si, continuar')}`,
                                confirmButtonClass: 'btn btn-outline-success',
                                showCloseButton: true,
                            }).then((result) => {
                                if (result.value) {
                                    swal.fire({
                                        type: 'info',
                                        title: __('Acepta las notificaciones'),
                                        html: __('Verifica y acepta las notificaciones que está solicitando el navegador'),
                                        showConfirmButton: false,
                                    });
                                    App.pushWeb.enablePushNotifications(vetId);
                                }
                                if (result.dismiss == "cancel") {
                                    localStorage.setItem(`disableNotifications_${vetId}`, new Date());
                                }
                            });
                            return;
                        }
                    });
                });
            }
        },
        enablePushNotifications: function (vetId) {
            navigator.serviceWorker.ready.then(registration => {
                registration.pushManager.getSubscription().then(subscription => {
                    if (subscription) {
                        return subscription;
                    }
                    const serverKey = App.urlBase64ToUint8Array(VAPID_PUBLIC_KEY);
                    return registration.pushManager.subscribe({
                        userVisibleOnly: true,
                        applicationServerKey: serverKey
                    });
                }).then(subscription => {
                    swal.close();
                    if (!subscription) {
                        swal.fire({
                            'type': 'error',
                            'title': __('Ocurrió un error en la suscripción de notificaciones'),
                            'text': __('Tu navegador parece no ser compatible con esta funcionalidad o has rechazado los permisos necesarios.')
                        });
                        return;
                    }
                    App.pushWeb.subscribe(subscription, vetId);
                }, error => {
                    swal.fire({
                        'type': 'error',
                        'title': __('Tu navegador parece no ser compatible con esta funcionalidad. Te recomendamos Google Chrome.'),
                        'text': error.toString(),
                    });
                });
            });
        },
        disablePushNotifications: function () {
            navigator.serviceWorker.ready.then(registration => {
                registration.pushManager.getSubscription().then(subscription => {
                    if (!subscription) {
                        return;
                    }

                    subscription.unsubscribe().then(() => {
                        fetch('/Notifications/Unsubscribe', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            body: JSON.stringify({
                                endpoint: subscription.endpoint
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    localStorage.removeItem(`enableNotifications`)
                                }
                                if (data && data.notifications) {
                                    showNotifications(data.notifications);
                                }
                            })
                            .catch((error) => {
                                console.error('Error:', error);
                            });
                    })
                });
            });
        },
        check: function () {
            let el = $("#pushWebCheck");
            if (el.length) {
                let checkPush = el.find("input");
                let enabledPush = localStorage.getItem(`enableNotifications`) == checkPush.val();
                $("#pushWebCheck").find("input").bootstrapSwitch('state', enabledPush);
                $("#pushWebCheck").animate({ 'opacity': 1 });
            }
        },
        change: function () {
            let checkPush = $("#pushWebCheck").find("input");
            let enabledPush = localStorage.getItem(`enableNotifications`) == checkPush.val();
            let vetId = checkPush.val();
            if (enabledPush != checkPush.bootstrapSwitch('state')) {
                if (enabledPush) {
                    swal.fire({
                        type: 'warning',
                        title: __('¿Realmente desea inhabilitar las notificaciones?'),
                        text: __('Esta acción sólo inhabilita las notificaciones de la veterinaria actual en este dispositivo. Puedes volver a habilitarlas cuando lo desees.'),
                        buttonsStyling: false,
                        showCancelButton: true,
                        cancelButtonText: `${__('No, cancelar')}`,
                        cancelButtonClass: 'btn btn-default',
                        showConfirmButton: true,
                        confirmButtonText: `<i class="fa fa-times"></i> ${__('Si, desactivarlas')}`,
                        confirmButtonClass: 'btn btn-outline-warning',
                        showCloseButton: true,
                    }).then((result) => {
                        if (result.value) {
                            App.pushWeb.disablePushNotifications();
                            localStorage.setItem(`disableNotifications_${vetId}`, new Date());
                        }
                    });
                } else {
                    localStorage.removeItem(`disableNotifications_${vetId}`);
                    App.pushWeb.getSubscription(vetId);
                }
            }
        },
    },
    urlBase64ToUint8Array: function (base64String) {
        var padding = "=".repeat((4 - (base64String.length % 4)) % 4);
        var base64 = (base64String + padding).replace(/\-/g, "+").replace(/_/g, "/");

        var rawData = window.atob(base64);
        var outputArray = new Uint8Array(rawData.length);

        for (var i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    },
    startStopwatch:function(date, classElement) {
        var interval = setInterval(function() {
            var initialDate = new Date(date);
            var currentDate = new Date();
            var elapsedTime = currentDate - initialDate;
    
            var hours = Math.floor(elapsedTime / (1000 * 60 * 60));
            var minutes = Math.floor((elapsedTime % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((elapsedTime % (1000 * 60)) / 1000);
    
            $('.'+classElement).html(' '+ (hours>0 ? hours + "h " : '') + (minutes > 0 ? minutes + "m " : '') + seconds + "s ");
    
            if (seconds <= 0 && minutes <= 0 && hours <= 0) {
                clearInterval(interval);
                $('.'+classElement).html(' '+"0h 0m 0s");
            }
        }, 1000);
    },
    ads: {
        load: function (el) {
            let href = $(el).parent('a').attr('href');
            let url = new URL(href);
            App.sendGTag('adLoaded', {
                'campaign': url.searchParams.get('utm_campaign'), 
                'ad_image': $(el).attr("src"),
                'link_url': href
            });
        },
        click: function (el) {
            let href = $(el).attr('href');
            let url = new URL(href);
            App.sendGTag('adClick', {
                'campaign': url.searchParams.get('utm_campaign'), 
                'ad_image': $(el).find("img:visible").attr("src"),
                'link_url': href,
            });
        }
    }
};
Object.defineProperty(Array.prototype, "pluck", {
    value: function (key) {
        return this.map(function (object) { return object[key]; });
    }
});
Object.defineProperty(Array.prototype, "sum", {
    value: function () {
        return this.reduce((a, v) => a +v, 0);
    }
});
(function ($) {
    $.fn.formCondition = function () {
        var form = this;
        form.find(':disabled').addClass('orgdisabled');

        //función para condicionar cuando los campos son nullables dependiendo de otro campo
        form.find('[data-null]').on('change', function () {
            let nul = $(this).data("null");
            let el = $(this);
            var type = el.attr("type");
            var value = (type == "checkbox" ? (el.is(":checked") ? 1 : 0) : el.val());
            form.find("[data-nullable='" + nul + "']").each(function () {
                let me = $(this);
                let condvals = me.data('nullablevalues').toString().split("|");
                let validate = (condvals.indexOf(value + "") >= 0);
                if (validate) {
                    me.prop('required', false)
                } else {
                    me.prop('required', true)
                }
            });
        });

        form.find('[data-cond]').on('change', function () {
            var el = $(this);
            var cond = el.data("cond");
            var type = el.attr("type");
            var value = (type == "checkbox" ? (el.is(":checked") ? 1 : 0) : el.val());
            form.find("[data-conditioned='" + cond + "']").each(function () {
                var me = $(this);
                var condvals = me.data('condvalues').toString().split("|");
                var valid = (condvals.indexOf(value + "") >= 0);
                var obj = me.hasClass('item-form') ? me : me.closest('.item-form');
                obj.toggle(valid).find('select:not(.orgdisabled),input:not(.orgdisabled),textarea:not(.orgdisabled)').prop('disabled', !valid);
                obj.find(".selectpicker:not(:disabled)").selectpicker('refresh');
                if ($.fn.iCheck) {
                    obj.find(".icheck").iCheck('update');
                }
            });
        });
        form.find('[data-conditioned-morphs]:not(.orgdisabled)').each(function () {
            let parent_invisible = $(this).closest('.item-form');
            parent_invisible.css('display', 'none');
        });
        setTimeout(function () {
            form.find('[data-cond]').change();
            form.find('[data-morphs]').change();
        }, 400);
        return this;
    };
})(jQuery);
App.init();