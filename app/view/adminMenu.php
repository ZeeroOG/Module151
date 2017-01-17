<style>
	.adminMenu {
		border: 3px solid #4d4d4d;
		border-radius: 5px;
		background-color: #F3F2F2;
		padding: 5px;
		width: 150px;
		float: left;
	}
	.adminMenu ul {
		list-style-type: none;
		margin-left: -35px;
	}
	.adminMenu p {
		text-align: center;
	}
	.adminMenu li {
		width: 95%;
		padding: 2px;
	}
	.adminMenu button {
		width: 100%;
	}
	.adminMenu a {
		text-decoration: none;
		color: black;
	}
	.adminMenu-top {
		font-weight: bold;
		font-size: 13pt;
	}
	@media screen and (max-width: 1000px) {
	  .adminMenu {
		  float: none;
		  width: 90%;
		  max-width: 440px;
		  margin-bottom: 20px;
		  margin-left: auto;
		  margin-right: auto;
	  }
	  .adminMenu-left {
		  width: 49%;
		  display:inline-block;

	  }
	  .adminMenu-right {
		  width: 49%;
		  display:inline-block;
	  }
  	}
</style>
<div class="adminMenu">
	<p>~~~ Menu ~~~</p>
	<div class="adminMenu-left">
		<p class="adminMenu-top">Opérateur</p>
		<ul>
			<li><a href="?p=addFilm"><button>Ajouter un film</button></a></li>
			<li><a href="?p=listFilms"><button>Liste des films</button></a></li>
		</ul>
	</div>
	<?php if($_SESSION['user']->getLevel() > 2) { ?>
	<div class="adminMenu-right">
		<p class="adminMenu-top">Administrateur</p>
		<ul>
			<li><a href="?p=importDB"><button>Mettre à jour la DB</button></a></li>
			<li><a href="?p=addUser"><button>Ajouter un utilisateur</button></a></li>
			<li><a href="?p=viewUsers"><button>Liste des utilisateurs</button></a></li>
		</ul>
	</div>
	<?php } ?>
</div>
