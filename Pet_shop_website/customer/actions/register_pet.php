<head>
     <link rel="stylesheet" href="../public/style.css">
</head>
   <header>Registre o seu pet </header>
     <main>
     <form action="/cursophp/site_teste/actions/processos_formulario.php" method="post">
            <label for="nome_pet">Nome do pet</label>
            <input type="text" name="NomePet" id="nome_pet">

            <label for="id_pet">Registro do pet</label>
            <input type="number" name="IdDoPet" id="id_pet">

            <label for="idade_pet">Data de nascimento</label>
            <input type="date" name="IdadePet" id="idade_pet">

            <input type="submit" value="Enviar"> 
        </form>     
     </main>
