$(document).ready(function () {


    /***** Fonction d'affichage d'image lors d'une valeur dans un input *****/

    $("#inputLogoLabo").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                console.log(this.files);
                $('.labo-logo').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });

    /***** Fonction changement de langue *****/

    var langVal;

    $(".language-select").msDropDown();

    $('.delete-container').remove();

    $(".language-select").change(function () {
        langVal = $(this).val();
        $.ajax({
            url: "functions/change_language.php",
            method: "POST",
            data: { langVal: langVal },
            success: function (data) {
                console.log(data);
                location.reload();
            }
        });
    });

    /***** Fonctions hamburger *****/

    $('.hamburger--accessible').click(function () {
        $(this).toggleClass('is-active');
    });

    /***** Page Inscription *****/

    $(".toggle-password").click(function () {

        $(this).toggleClass("fa-eye fa-eye-slash");
        var input = $($(this).attr("toggle"));

        inputParent = $(this).parent();
        console.log(inputParent);
        if (inputParent.hasClass('input-form-password')) {
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        }
    });

    /***** Fonction Déconnexion *****/

    $('.logout').on('click', function () {
        $.ajax({
            url: 'functions/signout.php',
            success: function (data) {
                console.log(data);
                if (data == "logout") {
                    Swal.fire({
                        title: '<strong>Vous avez bien été déconnectée !</strong>',
                        type: 'success',
                        showCloseButton: true,
                        focusConfirm: false,
                        footer: '<p>Revenez vite...</p>'
                    })
                    setTimeout(location.reload.bind(location), 1500);

                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez recommencer'
                    })
                }
            }
        });
    });

    /***** Page Connexion *****/

    $('.pageConnect form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/login.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);

                if (data == 0) {
                    $(".message").html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "  Adresse email ou mot de passe invalide, veuillez réessayer.\n" +
                        "</div>");
                } else if (data == 1) {
                    $(".message").html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "                    Erreur lors de la connexion, référez vous au message précédemment affichée. \n" +
                        "</div>");
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur d\'accès au projet',
                        text: 'Vous essayez de vous connecter à un projet dont vous n\'êtes pas autorisé à accéder. Si vous voulez y accéder, veuillez contacter l\'administrateur du site'
                    })
                } else if (data == 2) {
                    $(".message").html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "                    Erreur lors de la connexion, référez vous au message précédemment affichée. \n" +
                        "</div>");
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur d\'activation de compte',
                        text: 'Votre compte n\'a pas encore été activé par l\'administrateur. Contactez l\'administrateur du site si vous vous êtes inscrit il y a longtemps et que votre compte n\'a pas toujours pas été activé.'
                    })
                } else {
                    $('.form-signin').append(data);
                    window.location.replace("profil.php?mail=" + $('.mailUser').val());
                    $(".message").html("<div class=\"alert alert-success\" role=\"alert\">\n" +
                        "                        Connexion réussie, patientez vous allez être redirigé dans un instant.. \n" +
                        "</div>");
                }
            }
        });
    });

    /***** Page Oublier mot de passe *****/

    $('.pageForgotpwd form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/sendmail.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    $('input').val('');
                    Swal.fire({
                        title: '<strong>Mail envoyé !</strong>',
                        type: 'success',
                        html: 'N\'hésitez pas à regarder dans vos <i>spams.</i>',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Good !',
                        footer: '<p>Allez vite voir, vous n\'avez qu\'une heure..</p>'
                    })

                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Votre adresse email n\'a pas été reconnu',
                        footer: '<a href="inscription.php">Êtes-vous sur de vous êtes inscrit ?</a>'
                    })
                }
            }
        });
    });

    /***** Page Réinitialiser mot de passe *****/

    $('.pageResetpwd form').submit(function (e) {
        e.preventDefault();
        var emailGet = $('.emailGet').val();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/updatepassword.php?email=' + emailGet,
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    $('input').val('');
                    Swal.fire({
                        title: '<strong>Mot de passe changé !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre mot de passe a bien été changé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<a style="text-decoration: none; color: white;" href="connection.php"><i class="fa fa-thumbs-up"></i> Me connecter</a>',
                    })
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que les mots de passe soient identiques.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    /***** Page Inscription *****/

    $(".pageInsc form").on('submit', (function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: "functions/checkmail.php",
            type: "POST",
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    $(".message").html("<div class=\"alert alert-success\" role=\"alert\">\n" +
                        "                        Un compte avec cette adresse email n\'a pas été créé, elle est donc disponible ! \n" +
                        "                    </div>");
                    $.ajax({
                        url: 'functions/signin.php',
                        type: 'POST',
                        data: dataForm,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            if (data == 1) {
                                $('input').val("");
                                Swal.fire({
                                    title: '<strong>Ton compte a bien été créé !</strong>',
                                    type: 'success',
                                    html:
                                        '<p>Allez voir vos mails, une surprise vous y attend.</p>',
                                    showCloseButton: true,
                                    focusConfirm: true
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Erreur..',
                                    text: 'Une erreur est survenue, veuillez réessayer.',
                                    focusConfirm: false,
                                    confirmButtonText:
                                        '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                                })
                            }
                        }
                    });


                } else {
                    $(".message").html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "  Un compte avec cette adresse mail a déjà été créé. Veuillez en choisir une autre.\n" +
                        "</div>");

                }
            }
        });
    }));

    /***** Page Rechercher *****/

    $('.txt-menu').click(function () {
        $(".search-modal").addClass('is-displayed');
    });

    $(".site-search").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table  tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });

    $('.close-container').click(function () {
        $(".search-modal").removeClass('is-displayed');
    });

    //modification :ajout de cette methode
    $('.site-search').keyup(function () {
        if (!this.value) {
            $('.hidden').css('display', 'none')
        }
    });//fin modification

    /***** Page Admin : Affichage des tableaux lorsque l'on charge la page *****/

    if (window.location.href.indexOf("admin_utilisateurs") > -1) {
        updateUserTable();
    }

    if (window.location.href.indexOf("admin_laboratoires") > -1) {
        updateLaboTable();
    }

    if (window.location.href.indexOf("admin_utilisateurs_activation") > -1) {
        updateUserTableActive();
    }

    if (window.location.href.indexOf("admin_projets") > -1) {
        updateProjetTable();
    }

    if (window.location.href.indexOf("participants") > -1) {
        updateParticipantTable();
    }

    /***** Page Admin : Laboratoire *****/

    $('.admin-add-data-labo').click(function () {
        $('#add_labo_Modal').modal('show');
    });

    $('#Labo').on('click', '.edit-data', function () {
        var id_user = $(this).attr("id");
        $.ajax({
            url: "functions/admin_edit_data_labo.php",
            method: "POST",
            data: { id_user: id_user },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $(".action-button").attr("disabled", false);
                $('#update_labo_Modal #inputId').val(data.id_laboratoire);
                $('#update_labo_Modal #inputNom').val(data.nom_laboratoire);
                $('#update_labo_Modal #inputAbrevLabo').val(data.abreviation_laboratoire);
                $('#update_labo_Modal #inputUrl').val(data.site_laboratoire);
                if (data.img_laboratoire) {
                    $("#update_labo_Modal .labo-logo").toggleClass("showing-logo").attr("src", "../media_commun/laboratoire/" + data.img_laboratoire);
                }
                $("#update_labo_Modal .update-user-button").attr("iduser", data.id_utilisateur);
                $("#update_labo_Modal .delete-user-button").attr("iduser", data.id_utilisateur);
                $('#update_labo_Modal textarea').froalaEditor('html.set', '' + data.description_laboratoire + '');

                //modification
                //par default on decoche les cases
                $("#update_labo_Modal .custom-control-input").prop("checked", false);

                // //une loop  et voir si data.id_projects[...]=this.value if true then cocher
                $("#update_labo_Modal .custom-control-input").each(function () {
                    if (data.id_projects.indexOf($(this).val()) !== -1) {
                        $(this).prop("checked", true);

                    }

                })
                //fin modification

                $('#update_labo_Modal').modal('show');
            }
        });
    });

    $("#add_labo_Modal form").on('submit', (function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: "functions/admin_add_labo.php",
            type: "POST",
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $("#Labo > tbody").html("");
                $(".message").html("");
                $('#add_user_Modal').modal('hide');
                updateLaboTable();
                if (data == 1) {
                    //$('input').val("");
                    Swal.fire({
                        title: '<strong>Le laboratoire a bien été ajouté</strong>',
                        type: 'success',
                        html:
                            '<p>Vous verrez le laboratoire dans le site et dans la liste de cette page.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<p>Fermer</p>',
                    })
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    }));

    $('.action-button').click(function () {
        var thisButton = $(this);
        var action = $(this).attr('id');
        $('#update_labo_Modal form').submit(function (e) {
            e.preventDefault();
            var dataForm = new FormData(this);
            $.ajax({
                url: "functions/admin_update_delete_labo.php?action=" + action,
                type: "POST",
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $("#Labo > tbody").html("");
                    $(".message").html("");
                    $('#update_labo_Modal').modal('hide');
                    updateLaboTable();
                    thisButton.attr("disabled", true);
                    if (data == 1) {
                        $('input').val("");
                        Swal.fire({
                            title: '<strong>Mises à jours</strong>',
                            type: 'success',
                            html:
                                '<p>Les informations du laboratoire ont bien étés mises à jours..</p>',
                            showCloseButton: true,
                            focusConfirm: false

                        }).then((result) => { //modificatio
                            // Reload the Page
                            location.reload();
                        })//fin modification
                    } else if (data == 2) {
                        Swal.fire({
                            title: '<strong>Laboratoire supprimé</strong>',
                            type: 'success',
                            html:
                                '<p>Le laboratoire séléctionné a bien été supprimé.</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Erreur..',
                            text: 'Une erreur est survenue, veuillez réessayer.',
                            focusConfirm: false,
                            confirmButtonText:
                                '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                        })
                    }
                }
            });
        });
    });

    /***** Page Admin : Ajout/Suppression/Edit utilisateur *****/

    $('.admin-add-data').click(function () {
        $('#add_user_Modal').modal('show');
    });

    $('#Users').on('click', '.edit-data', function () {
        var id_user = $(this).attr("id");
        $.ajax({
            url: "functions/admin_edit_data_users.php",
            method: "POST",
            data: { id_user: id_user },
            dataType: "json",
            success: function (data) {
                $(".action-button").attr("disabled", false);
                console.log(data);
                $('#update_user_Modal #inputId').val(data.id_utilisateur);
                $('#update_user_Modal #inputNom').val(data.nom_utilisateur);
                $('#update_user_Modal #inputPrenom').val(data.prenom_utilisateur);
                $('#update_user_Modal #inputEmail').val(data.mail_utilisateur);
                $('#update_user_Modal #inputEtab').val(data.etablissement_utilisateur);
                $('#update_user_Modal #inputUrl').val(data.site_utilisateur);
                $('#update_user_Modal .userSuperadmin-select').val(data.super_admin);
                $('#update_user_Modal .userLabo-select').val(data.id_laboratoire);
                $('#update_user_Modal .userStatut-select').val(data.statut_utilisateur);
                $('#update_user_Modal textarea').froalaEditor('html.set', '' + data.mission_utilisateur + '');


               

                //modification
                //par defaut decocher toutes les cases des projets 
                $("#update_user_Modal .form-check-input").prop("checked", false);
                $("#update_user_Modal .form-check-input").attr("disabled", false);

                // //une loop  et voir si data.id_projects[...]=this.value if true then cocher
                $("#update_user_Modal .form-check-input.check-project").each(function () {

                    for (var ii = 0; ii < data.id_projects.length; ii++) {
                        var pp = data.id_projects[ii];
                        //cocher le projet
                        if (pp[0] == $(this).val()) {  //($(this).val())) !== -1
                            $(this).prop("checked", true);
                        }

                        if (pp[1] == "0") {  //si c un user 
                            $("#update_user_Modal .form-check-input.child0" + pp[0]).prop('checked', true);
                        }

                        if (pp[1] == "1") {  //si c un admin
                            $("#update_user_Modal .form-check-input.child1" + pp[0]).prop('checked', true);
                        }

                    }//end for

                })



                $("#update_user_Modal .form-check-input.check-project").each(function () {
                    if (!$(this).is(':checked')) {
                        ////si le projet n'st pas coucher disabled les radios
                        $(this).closest('.project-access').find(':radio').attr("disabled", true)
                    }
                })


                //fin modification


                $("#update_user_Modal .update-user-button").attr("iduser", data.id_utilisateur);
                $("#update_user_Modal .delete-user-button").attr("iduser", data.id_utilisateur);
                $('#update_user_Modal').modal('show');
            }
        });
    });

    $("#add_user_Modal form").on('submit', (function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: "functions/checkmail.php",
            type: "POST",
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                if (data == 0) {
                    $(".message").html("<div class=\"alert alert-success\" role=\"alert\">\n" +
                        "                        Un compte avec cette adresse email n\'a pas été créé, elle est donc disponible ! \n" +
                        "                    </div>");
                    $.ajax({
                        url: 'functions/signin.php',
                        type: 'POST',
                        data: dataForm,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {
                            console.log(data);
                            if (data == 1) {
                                $('input').val("");
                                $("#Users > tbody").html("");
                                $(".message").html("");
                                $('#add_user_Modal').modal('hide');
                                updateUserTable();
                                Swal.fire({
                                    title: '<strong>Ton compte a bien été créé !</strong>',
                                    type: 'success',
                                    html:
                                        '<p>Vous pouvez maintenant vous connecter avec votre adresse email et votre mot de passe.</p>',
                                    showCloseButton: true,
                                    focusConfirm: false,
                                    confirmButtonText:
                                        '<p>Fermer</p>',
                                })
                            }
                            else {
                                Swal.fire({
                                    type: 'error',
                                    title: 'Erreur..',
                                    text: 'Une erreur est survenue, veuillez réessayer.',
                                    focusConfirm: false,
                                    confirmButtonText:
                                        '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                                })
                            }
                        }
                    });


                } else {
                    $(".message").html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                        "  Un compte avec cette adresse mail a déjà été créé. Veuillez en choisir une autre.\n" +
                        "</div>");

                }
            }
        });
    }));

    $('.pageAdminUser .edit-user-button').click(function () {
        var thisButton = $(this);
        $('.add_user').submit(function (e) {
            e.preventDefault();
            var dataForm = new FormData(this);
            $.ajax({
                url: 'functions/admin_update_data_users.php',
                type: 'POST',
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    thisButton.attr("disabled", true);
                    if (data == 1) {
                        $("#Users > tbody").html("");
                        updateUserTable();
                        $('#update_user_Modal').modal('hide');
                        Swal.fire({
                            title: '<strong>Mises à jours</strong>',
                            type: 'success',
                            html:
                                '<p>Vos informations ont bien étés mises à jours..</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        })
                    }
                    else {
                        Swal.fire({
                            type: 'error',
                            title: 'Erreur..',
                            text: 'Une erreur est survenue, veuillez réessayer.',
                            focusConfirm: false,
                            confirmButtonText:
                                '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                        })
                    }
                }
            });
        });
    });

    $('.delete-user-button').click(function () {
        var thisButton = $(this);
        $('.add_user').submit(function (e) {
            e.preventDefault();
            var dataForm = new FormData(this);
            $.ajax({
                url: 'functions/admin_delete_user.php',
                type: 'POST',
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    thisButton.attr("disabled", true);
                    console.log(data);
                    $("#Users > tbody").html("");
                    updateUserTable();
                    $('#update_user_Modal').modal('hide');
                    if (data == 1) {
                        Swal.fire({
                            title: '<strong>Utilisateur supprimé</strong>',
                            type: 'success',
                            html:
                                '<p>L\'utilisateur a bien été supprimé.</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        });
                    }
                    else {
                        Swal.fire({
                            type: 'error',
                            title: 'Erreur..',
                            text: 'Une erreur est survenue, veuillez réessayer.',
                            focusConfirm: false,
                            confirmButtonText:
                                '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                        })
                    }
                }
            });
        });
    });

    /***** Page Admin : Activation d'utilisateur *****/

    $('.pageAdminUserActivate .edit-user-button').click(function () {
        $('.add_user').submit(function (e) {
            e.preventDefault();
            var dataForm = new FormData(this);
            $.ajax({
                url: 'functions/admin_update_data_users_active.php',
                type: 'POST',
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    console.log(data);
                    if (data == 0) {
                        Swal.fire({
                            type: 'error',
                            title: 'Erreur..',
                            text: 'Une erreur est survenue, veuillez réessayer.',
                            focusConfirm: false,
                            confirmButtonText:
                                '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                        })
                    }
                    else {
                        $("#Users > tbody").html("");
                        updateUserTableActive();
                        $('#update_user_Modal').modal('hide');
                        Swal.fire({
                            title: '<strong>Changements sauvegardés</strong>',
                            type: 'success',
                            html:
                                '<p>Les changements lié au compte ont bien été sauvegardés.</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        });
                    }
                }
            });
        });
    });




    $(".check-project").click(function () {

        if ($(this).is(":checked")) {

            $(this).closest('.project-access').find(':radio').attr("disabled", false)

        } else {

            $(this).closest('.project-access').find(':radio').prop("checked", false)
            $(this).closest('.project-access').find(':radio').attr("disabled", true)


        }
    });

    /***** Page Admin : Gestion des projets *****/

    $('.admin-add-data').click(function () {
        $('#add_projet_Modal').modal('show');
    });

    $('#Projets').on('click', '.edit-data', function () {
        $('#update_projet_Modal').modal('show');
        var id_projets = $(this).attr("id");
        $.ajax({
            url: "functions/admin_edit_data_projet.php",
            method: "POST",
            data: { id_projets: id_projets },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $(".action-button").attr("disabled", false);
                if (data.logo_projet) {
                    $("#update_projet_Modal .projet-logo").toggleClass("showing-logo").attr("src", "../media_commun/projet/" + data.logo_projet);
                }
                else {
                    $("#update_projet_Modal .projet-logo").toggleClass("showing-logo").attr("src", "../media_commun/projet/default-thumb.png");
                }
                $('#update_projet_Modal #inputId').val(data.id_projet);
                $('#update_projet_Modal #inputNomupdate').val(data.nom_projet);
                $('#update_projet_Modal #inputAbreviationupdate').val(data.abreviation_projet);
                $('#update_projet_Modal #inputResumeupdate').val(data.resume_projet);
                $('#update_projet_Modal #inputDateDebutupdate').val(data.date_debut_projet);
                $('#update_projet_Modal #inputDateFinupdate').val(data.date_fin_projet);
                if (data.media_projet) {
                    $("#update_projet_Modal .media-logo").toggleClass("showing-logo").attr("src", "../index_pack/media/" + data.media_projet);
                }
                else {
                    $("#update_projet_Modal .media-logo").toggleClass("showing-logo").attr("src", "../index_pack/media/default-thumb.png");
                }
            }
        });
    });

    $('#Projets').on('click', '.resume-data', function () {
        $('#resume_projet_Modal').modal('show');
        var id_projets = $(this).attr("id");
        $.ajax({
            url: "functions/admin_edit_data_projet.php",
            method: "POST",
            data: { id_projets: id_projets },
            dataType: "json",
            success: function (data) {
                console.log(data);
                $(".action-button").attr("disabled", false);
                $('#resume_projet_Modal #inputIdread').val(data.id_projet);
                $('#resume_projet_Modal #inputResumeread').val(data.resume_projet);
            }
        });
    });

    $("#add_projet_Modal form").on('submit', (function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: "functions/admin_add_projet.php",
            type: "POST",
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                console.log(data);
                $("#Projets > tbody").html("");
                $(".message").html("");
                $('#add_projet_Modal').modal('hide');
                updateProjetTable();
                if (data == 1) {
                    $('input').val("");
                    Swal.fire({
                        title: '<strong>Le projet a bien été ajouté</strong>',
                        type: 'success',
                        html:
                            '<p>Vous verrez le projet dans le site et dans la liste dérrière ce modal qui s\'est mise à jour..</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                        confirmButtonText:
                            '<p>Fermer</p>',
                    })
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    }));

    $('.pageAdminProjet .action-button').click(function () {
        var thisButton = $(this);
        var action = $(this).attr('id');
        $('#update_projet_Modal form').submit(function (e) {
            e.preventDefault();
            var dataForm = new FormData(this);
            $.ajax({
                url: "functions/admin_update_delete_projet.php?action=" + action,
                type: "POST",
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    console.log(data);
                    $("#Projets > tbody").html("");
                    $(".message").html("");
                    $('#update_projet_Modal').modal('hide');
                    updateProjetTable();
                    thisButton.attr("disabled", true);
                    if (data == 1) {
                        $('input').val("");
                        Swal.fire({
                            title: '<strong>Mises à jours</strong>',
                            type: 'success',
                            html:
                                '<p>Les informations du projet ont bien étés mises à jours..</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        })
                    } else if (data == 2) {
                        Swal.fire({
                            title: '<strong>Projet supprimé</strong>',
                            type: 'success',
                            html:
                                '<p>Le projet séléctionné a bien été supprimé.</p>',
                            showCloseButton: true,
                            focusConfirm: false
                        });
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Erreur..',
                            text: 'Une erreur est survenue, veuillez réessayer.',
                            focusConfirm: false,
                            confirmButtonText:
                                '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                        })
                    }
                }
            });
        });
    });

    /***** Page Action *****/

    $('.modifProfil-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/verifmodifprofil.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Profil changé !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre profil a bien été mis a jour changé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("profil.php?mail=" + $('.mailUtil').val());
                }
                else if (data == 2) {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: "Etes-vous sur d'etre la bonne personne ? Veuillez entrer le bon mot de passe.",
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.ajoutAction-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/verifajoutaction.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Action crée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre action a bien été crée.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("actions.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.supAction-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/verifsupprimeraction.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Action supprimé !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre action a bien été supprimé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("actions.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.modifAction-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/verifmodifaction.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 111) {
                    Swal.fire({
                        title: '<strong>Action modifié !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre action a bien été modifié.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("action.php?action=" + $('.nbAction').val());
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.mediasDelete').click(function () {
        var id_media = $(this).attr("id");
        $.ajax({
            url: "functions/deleteMedia.php",
            method: "POST",
            data: { id_media: id_media },
            success: function (data) {
                console.log(data);
                window.location.reload();
            }
        })
    });

    $('.pagePart').click(function () {
        var nb_page = $(this).attr("id");
        console.log(nb_page);
        $.ajax({
            url: "functions/admin_select_participants.php",
            method: "POST",
            data: { nbPage: nb_page },
            success: function (data) {
                console.log(data);
                $('.tbody-table-participants').html(data);
            }
        })
    });


    /***** Page Actualité *****/

    $('.ajoutActu-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/insertActualite.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Actualité crée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre actualité a bien été crée.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("actualites.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.modifActu-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/updateActualite.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Actualité modifiée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre actualité a bien été modifiée</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("actualites.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.deleteActu-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/deleteActualite.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Actualité supprimé</strong>',
                        type: 'success',
                        html:
                            '<p>Votre actualité a bien été supprimé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("actualites.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i>Réessayer</p>',
                    })
                }
            }
        });
    });

    /***** Page Publication *****/

    $('.ajoutPub-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/insertPublication.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Publication crée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre publication a bien été crée.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("publications.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien verifié que vous avez tout rempli.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.modifPub-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/updatePublication.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Publication modifiée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre Publication a bien été modifiée</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("publications.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.deletePub-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/deletePublication.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>Publication supprimé</strong>',
                        type: 'success',
                        html:
                            '<p>Votre publication a bien été supprimé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("publications.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i>Réessayer</p>',
                    })
                }
            }
        });
    });

    /***** Page These *****/

    $('.ajoutThese-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/insertThese.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>These crée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre these a bien été crée.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("theses.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien verifié que vous avez tout rempli.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.modifThese-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/updateThese.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>These modifiée !</strong>',
                        type: 'success',
                        html:
                            '<p>Votre these a bien été modifiée</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("theses.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

    $('.deleteThese-btn form').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/deleteThese.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    Swal.fire({
                        title: '<strong>These supprimé</strong>',
                        type: 'success',
                        html:
                            '<p>Votre these a bien été supprimé.</p>',
                        showCloseButton: true,
                        focusConfirm: false,
                    })
                    window.location.replace("theses.php");
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Une erreur est survenue, veuillez réessayer.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien que vous avez tous remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i>Réessayer</p>',
                    })
                }
            }
        });
    });

    /***** Page Contact *****/

    $('.form-contact').submit(function (e) {
        e.preventDefault();
        var dataForm = new FormData(this);
        $.ajax({
            url: 'functions/verifcontactmail.php',
            type: 'POST',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,

            success: function (data) {
                console.log(data);
                if (data == 1) {
                    $('.contact-form-container').html('<div class="alert alert-success" role="alert">\n' +
                        '  Votre message a bien été envoyé aux administrateurs, ils vous répondront rapidement.\n' +
                        '</div>');
                }
                else {
                    Swal.fire({
                        type: 'error',
                        title: 'Erreur..',
                        text: 'Vérifiez vos champs de texte.',
                        focusConfirm: false,
                        footer: 'Vérifiez bien verifié que vous avez tout remplis.',
                        confirmButtonText:
                            '<p><i class="fas fa-redo"></i></i> Réessayer</p>',
                    })
                }
            }
        });
    });

});

function updateParticipantTable() {
    $.ajax({
        url: "functions/admin_select_participants.php",
        async: false,
        success: function (data) {
            $('.tbody-table-participants').html(data);
        }
    });
}

function updateProjetTable() {
    $.ajax({
        url: "functions/admin_select_projet.php",
        async: false,
        success: function (data) {
            $('.tbody-table-projet').html(data);
        }
    });
}

function updateUserTable() {
    $.ajax({
        url: "functions/admin_select_user.php",
        async: false,
        success: function (data) {
            $('.tbody-table-users').html(data);
        }
    });
}

function updateUserTableActive() {
    $.ajax({
        url: "functions/admin_select_user_active.php",
        async: false,
        success: function (data) {
            $('.tbody-table-users-active').html(data);
        }
    });
}

function updateLaboTable() {
    $.ajax({
        url: "functions/admin_select_labo.php",
        async: false,
        success: function (data) {
            $('.tbody-table-labo').html(data);
        }
    });
}

function usgsChanged(el) {

    var TableID = $(el.options[el.selectedIndex]).attr("valueid");
    var TableCol = $(el.options[el.selectedIndex]).attr("valuecol");
    var TableDesc = $(el.options[el.selectedIndex]).attr("valuedesc");
    sortTable(TableID, TableCol, TableDesc);

}

function replaceSpec(Texte) {
    var TabSpec = { "à": "a", "á": "a", "â": "a", "ã": "a", "ä": "a", "å": "a", "ò": "o", "ó": "o", "ô": "o", "õ": "o", "ö": "o", "ø": "o", "è": "e", "é": "e", "ê": "e", "ë": "e", "ç": "c", "ì": "i", "í": "i", "î": "i", "ï": "i", "ù": "u", "ú": "u", "û": "u", "ü": "u", "ÿ": "y", "ñ": "n", "-": " ", "_": " " },
        reg = /[àáâãäåòóôõöøèéêëçìíîïùúûüÿñ_-]/gi;

    return Texte.replace(reg, function () {
        return TabSpec[arguments[0].toLowerCase()];
    }).toLowerCase();
}

function sortTable(tid, col, ord) {
    var mybody = $("#" + tid).children('tbody'),
        lines = mybody.children('tr'),
        sorter = [],
        i = -1,
        j = -1;

    while (lines[++i]) {
        sorter.push([lines.eq(i), lines.eq(i).children('td').eq(col).text()])
    }

    if (ord == 'asc') {
        sorter.sort(function (a, b) {
            var c1 = replaceSpec(a[1]),
                c2 = replaceSpec(b[1]);

            if (c1 > c2) {
                return 1;
            } else if (c1 < c2) {
                return -1;
            } else {
                return 0;
            }
        });
    } else if (ord == 'desc') {
        sorter.sort(function (a, b) {
            var c1 = replaceSpec(a[1]),
                c2 = replaceSpec(b[1]);

            if (c1 > c2) {
                return -1;
            } else if (c1 < c2) {
                return 1;
            } else {
                return 0;
            }
        });
    } else if (ord == 'nasc') {
        sorter.sort(function (a, b) {
            return (a[1] - b[1]);
        });
    } else if (ord == 'ndesc') {
        sorter.sort(function (a, b) {
            return (b[1] - a[1]);
        });
    } else if (ord == '?asc') {
        sorter.sort(function (a, b) {
            var x = parseInt(a[1], 10),
                y = parseInt(b[1], 10),
                c1 = replaceSpec(a[1]),
                c2 = replaceSpec(b[1]);

            if (isNaN(x) || isNaN(y)) {
                if (c1 > c2) {
                    return 1;
                } else if (c1 < c2) {
                    return -1;
                } else {
                    return 0;
                }
            } else {
                return (a[1] - b[1]);
            }
        });
    } else if (ord == '?desc') {
        sorter.sort(function (a, b) {
            var x = parseInt(a[1], 10),
                y = parseInt(b[1], 10),
                c1 = replaceSpec(a[1]),
                c2 = replaceSpec(b[1]);

            if (isNaN(x) || isNaN(y)) {
                if (c1 > c2) {
                    return -1;
                } else if (c1 < c2) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return (b[1] - a[1]);
            }
        });
    }

    while (sorter[++j]) {
        mybody.append(sorter[j][0]);
    }
}
