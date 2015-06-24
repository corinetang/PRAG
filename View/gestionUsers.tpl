<head>
<script src="View/js/gsetionUsers.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var idRole = <?php echo $_SESSION["user"][0]["id_Groupe"]; ?>;
        showUsers();
    };
</script>
</head>

<div id="gestionUsers">
    <h1>Gestion des membres</h1>
    <br>
    <table class="table table-striped">
        <thead>
        </thead>
        <tr id="tableau_gestionUsers">
            <td>Nom</td>
            <td>Prenom</td>
        </tr>
    </table>
</div>