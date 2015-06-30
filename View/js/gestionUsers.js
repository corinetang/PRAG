jQuery(document).ready(function (){
    $('#button_edit').click(function(e) {
        var rows = $('#tableau_gestionUsers tbody tr').index(this);
        console.log(rows);
        var index = rows.cells.item(0).innerHTML;
        console.log(index);
    });
    
    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').focus()
    });
} );

function espace(champ) {
	var ch = champ.value;
	if(ch.length == ch.split(" ").length){
		return true;
	}
}

function valideForm(f) {
	var nameOk = verifName(f.Nom);
	var prenomOk = verifName(f.Prenom);
	var mailOk = verifMail(f.mail);
	var nbSemestreOk = verifNbSemestre(f.NbSemestre);
   
   if (nameOk && prenomOk && mailOk && nbSemestreOk) {
	        return true;
   }
   else
   {
      alert("Veuillez remplir correctement tous les champs");
      return false;
   }
}
	
function verifName(champ) {
	if(champ.value.length <2 || champ.value == '' || espace(champ.value)) {
		surligne(champ, true);
		alert('Votre nom doit comporter au minimum 2 caracteres');
		return false;
	}
	else{ 
		return true;
	} 
}

function verifNbSemestre(champ) {
	var NbSemestre = parseInt(champ.value);
	if (isNaN(NbSemestre) || NbSemestre < 0 || NbSemestre > 7 || NbSemestre == '') {
		surligne(champ, true);
		alert('Le nombre de semestre doit etre compris entre 1 et 7');
		return false;
	}
	else
		return true;
}

function verifMail(champ)
{
   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
   if(!regex.test(champ.value) || champ.value =='')
   {
	   surligne(champ, true);
      alert('Veuillez entrer une adresse mail valide');
      return false;
   }
   else
   {
      return true;
   }
} 

function verifNumTel(champ)
{
   var tel = parseInt(champ.value);
   if(isNaN(tel) || tel != 10)
   {
	   surligne(champ, true);
      alert('Veuillez entrer votre numero à 10 choffres');
      return false;
   }
   else
   {
      return true;
   }
}

function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}
