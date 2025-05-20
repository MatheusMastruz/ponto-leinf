<?php
// index.php - Página inicial com navbar
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LEINF - Início</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <!-- Navbar -->
  <nav class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="index.php" class="text-xl font-bold text-blue-600">LEINF</a>
      <div class="space-x-4">
        <a href="login.php" class="btn-primary py-1 px-3 rounded-md text-sm">Login</a>
        <a href="cadastrar.php" class="btn-secondary py-1 px-3 rounded-md text-sm">Cadastro</a>
      </div>
    </div>
  </nav>

  <!-- Conteúdo principal opcional -->
  <div class="container mx-auto px-4 py-16 text-center text-gray-700">
    <h2 class="text-2xl font-semibold mb-4">Bem-vindo ao sistema LEINF</h2>
    <p>Use a navegação acima para acessar ou criar sua conta de monitor.</p>
  </div>
</body>
</html>