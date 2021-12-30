<script>
	import { onMount } from 'svelte';
	import { navigate } from 'svelte-routing';

	export let items = [];

	onMount(() => {
		items = [
			{name: 'Home', url: '/', active: true, items: []}, 
			{name: 'Datos Maestros', url: '#', active: true, items: [
				{name: 'Ubicaciones del Perú', url: '/master-data/location', active: true}, 
				{name: 'Espcialidades Clínicas', url: '/master-data/specialism', active: true}, 
			]}, 
			{name: 'COA', url: '#', active: true, items: [
				{name: 'Gestión de Dentistas', url: '/coa/dentist', active: true}, 
				{name: 'Gestión de Sedes', url: '/coa/branch', active: true}, 
			]}, 
		];
	});  
</script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
	<div class="container">
		<a class="navbar-brand" href="#">Container</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<!--
		<div class="collapse navbar-collapse" id="navbarsExample07">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false" >Dropdown</a>
					<ul class="dropdown-menu" aria-labelledby="dropdown07" id="">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item disabled" href="#">Another action</a></li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>
			</ul>
			<form>
				<input class="form-control" type="text" placeholder="Search" aria-label="Search">
			</form>
		</div>
	</div>
	-->
	<div class="collapse navbar-collapse" id="navbarsExample07">
		<ul class="navbar-nav me-auto mb-2 mb-lg-0">
			{#each items as item}
				{#if item.items !== undefined & item.items.length > 0}
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" id="dropdown07" data-bs-toggle="dropdown" aria-expanded="false" >{item.name}</a>
						<ul class="dropdown-menu" aria-labelledby="dropdown07" id="">
							{#each item.items as subItem}
								<li><a class="dropdown-item" on:click|preventDefault={() => {navigate(subItem.url)}} href="{subItem.url}">{subItem.name}</a></li>
							{/each}
						</ul>
					</li>
				{:else}
					<li class="nav-item">
						<a class="nav-link" on:click|preventDefault={() => {navigate(item.url)}} href="{item.url}" tabindex="-1">{item.name}</a>
					</li>
				{/if}
			{/each}
		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
					<a class="nav-link" href="#home"><i class="fa fa-home fa-fw" aria-hidden="true"></i>&nbsp;Home</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#about"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;About</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#projects"><i class="fa fa-folder-open fa-fw" aria-hidden="true"></i>&nbsp;Projects</a>
			</li>
			<li class="nav-item">
					<a class="nav-link" href="#experience"><i class="fa fa-briefcase fa-fw" aria-hidden="true"></i>&nbsp;Experience</a>
			</li>       
			<li class="nav-item">
					<a class="nav-link" href="#contact"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>&nbsp;Contact</a>
			</li>                     
	</ul>
	</div>
</nav>

<style>
  nav{
    margin-bottom: 10px;  
  }

	.dropdown-toggle:hover{
		cursor: pointer;
	}
</style>