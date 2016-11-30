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
		margin-bottom: 4px;
		width: 95%;
		border: 1px solid black;
		border-radius: 3px;
		padding: 2px;
		background-color: #B00707;
	}
	.adminMenu a {
		text-decoration: none;
		color: white;

	}
	.adminMenu-top {
		font-weight: bold;
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
		  width: 45%;
		  display:inline-block;

	  }
	  .adminMenu-right {
		  width: 45%;
		  display:inline-block;
	  }
  	}
</style>
<div class="adminMenu">
	<p>~~~ Menu ~~~</p>
	<div class="adminMenu-left">
		<h3 class="adminMenu-top">Opérateur</h3>
		<ul>
			<li><a href="?p=addFilm">Ajouter un film</a></li>
			<li><a href="?p=viewFilms">Liste des films</a></li>
		</ul>
	</div>
	<?php if($_SESSION['user']->getLevel() > 2) { ?>
	<div class="adminMenu-right">
		<h3 class="adminMenu-top">Administrateur</h3>
		<ul>
			<li><a href="?p=addUser">Ajouter un utilisateur</a></li>
			<li><a href="?p=viewUsers">Liste des utilisateurs</a></li>
		</ul>
	</div>
	<?php } ?>
</div>
