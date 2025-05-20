<?php
// login.php - Página de login estilizada com Tailwind
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LEINF - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    .fade-in {
      animation: fadeIn 0.5s ease-in-out;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .card-shadow {
      box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
    }
    .btn-primary { background-color: #3b82f6; color: white; }
    .btn-primary:hover { background-color: #2563eb; }
    .btn-secondary { background-color: #f3f4f6; color: #4b5563; }
    .btn-secondary:hover { background-color: #e5e7eb; }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
  <div class="container mx-auto px-4 py-8 flex-grow">
    <header class="text-center mb-8">
      <h1 class="text-3xl md:text-4xl font-bold text-blue-600">LEINF</h1>
      <p class="text-gray-600 mt-2">Registro de Ponto dos Monitores</p>
    </header>

    <main>
      <div class="max-w-md mx-auto bg-white rounded-lg p-6 card-shadow fade-in">
        <?php
        require 'conexao.php';
        $usuario = $_POST['usuario'] ?? '';
        $senha   = $_POST['senha'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          if ($usuario && $senha) {$stmt = $pdo->prepare("SELECT * FROM monitores WHERE usuario = :usuario LIMIT 1");
            $stmt->execute(['usuario' => $usuario]);$monitor = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($monitor && password_verify($senha, $monitor['senha'])) {
              echo '<p class="text-green-600 font-medium mb-4">Bem-vindo, '.htmlspecialchars($monitor['nome']).'!</p>';
            } else {
              echo '<p class="text-red-600 font-medium mb-4">Usuário ou senha inválidos.</p>';
            }
          } else {
            echo '<p class="text-red-600 font-medium mb-4">Preencha todos os campos.</p>';
          }
        }
        ?>

        <form action="login.php" method="POST" class="space-y-4">
          <div>
            <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">Usuário</label>
            <input type="text" name="usuario" id="usuario" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Digite seu usuário">
          </div>
          <div>
            <label for="senha" class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
            <input type="password" name="senha" id="senha" required
                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Digite sua senha">
          </div>
          <button type="submit" class="w-full btn-primary py-2 px-4 rounded-md font-medium">Entrar</button>
        </form>

        <div class="text-center mt-4">
          <a href="cadastrar.php" class="text-sm text-blue-600 hover:underline">Criar novo usuário</a>
          <br />
          <a href="index.php" class="text-sm text-gray-600 hover:underline">Voltar ao início</a>
        </div>
      </div>
    </main>
  </div>
</body>
</html>