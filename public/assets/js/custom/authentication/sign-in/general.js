"use strict";

const sleep = (ms) => new Promise((res) => setTimeout(res, ms));

var KTModalAdd = function () {
    var t, e, o, n, r, i;
    return {
        init: function () {
            r = document.querySelector("#kt_sign_in_form"),
                t = r.querySelector("#kt_sign_in_submit"),
                n = FormValidation.formValidation(r, {
                    fields: {
                        login: {
                            validators: {
                                notEmpty: {
                                    message: "Login Id is required"
                                },
                                regexp: {
                                    regexp: /(^[^\s@]+@[^\s@]+\.[^\s@]+$)|(^[0-9]{10}$)/,
                                    message: "Please enter a valid login id"
                                }
                            }
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Password is required"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                }),
                t.addEventListener("click", function (n) {
                    n.preventDefault();
                    n.stopPropagation();
                    var loginn = document.getElementById("Login").value;
                    var passwordd = document.getElementById("Password").value;
                    $.ajax({
                        type: "POST",
                        url: "/admin/auth",
                        data: {
                            login: loginn,
                            password: passwordd,
                            _token: '{{ csrf_token() }}'
                            // _token: document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        dataType: "json",
                        success: function (response) {
                            // if (response.status == 200) {
                            //     swal.fire({
                            //         text: "Your credentials matches our record",
                            //         icon: "success",
                            //         showConfirmButton: false
                            //     }).then(function () {
                            //         KTUtil.scrollTop();
                            //     });
                            //     const work = async () => {
                            //         await sleep(1000);
                            //         swal.close();
                            //         window.location = "/admin/dashboard";
                            //     };
                            //     work();
                            //     // const redirectAfterSuccess = async () => {
                            //     //     await swal.fire({
                            //     //         text: "Your credentials matches our record",
                            //     //         icon: "success",
                            //     //         showConfirmButton: false,
                            //     //         timer: 1000,
                            //     //         willClose: () => KTUtil.scrollTop()
                            //     //     });
                            //     //     window.location.href = "/admin/dashboard";
                            //     // };

                            //     // redirectAfterSuccess();

                            // } 
                        if (response.status == 200) {
                            swal.fire({
                                text: "Login successful",
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1000
                            }).then(() => {
                                window.location.href = response.redirect_url; // ✅ use redirect_url from backend
                            });
                        } else if (response.status == 201) {
                                swal.fire({
                                    text: "Password is incorrect",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                            } else if (response.status == 202) {
                                swal.fire({
                                    text: "User not found in our records",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                            } else if (response.status == 204) {
                                swal.fire({
                                    text: "You have been deactivated from logging into the panel. Kindly contact the admin to reinstate your privileges.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                            } else if (response.status == 205) {
                                swal.fire({
                                    text: "You have been banned from accessing the Admin Panel.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            } else if (response.status == 206) {
                                swal.fire({
                                    text: "You are not authorised to log into Admin Panel.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            }else if (response.status == 409) {
                                swal.fire({
                                    text: "User Already Login.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function() {
                                    KTUtil.scrollTop();
                                });
                            } else {
                                swal.fire({
                                    text: "Please enter a valid login id and password",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Try Again",
                                    customClass: {
                                        confirmButton: "btn font-weight-bold btn-light-primary"
                                    }
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                            }
                        }
                    });
                });
        }
    }
}();
KTUtil.onDOMContentLoaded(function () {
    KTModalAdd.init();
});