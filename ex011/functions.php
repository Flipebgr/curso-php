<?php 
//Lista de functions padrão do PHP que pode servir futuramente

$nome = "  João Silva  ";

// Limpeza e validação (SEMPRE faça isso antes de usar input do usuário)
trim($nome);              // remove espaços das bordas → "João Silva"
strtolower($nome);        // tudo minúsculo → "  joão silva  "
strtoupper($nome);        // tudo maiúsculo
strlen($nome);            // tamanho da string → 14
str_replace("a", "@", $nome); // substitui caracteres

// Busca
strpos($nome, "Silva");   // posição onde "Silva" começa (ou false)
str_contains($nome, "Silva"); // PHP 8 — retorna true/false ✅ mais legível

// Formatação
number_format(1234567.89, 2, ',', '.'); // → "1.234.567,89" (padrão BR)
sprintf("Olá, %s! Você tem %d anos.", "João", 25); // template de string


$input_usuario = "<script>alert('xss')</script>";

// PROTEÇÃO CONTRA XSS — converte caracteres perigosos em entidades HTML
htmlspecialchars($input_usuario, ENT_QUOTES, 'UTF-8');
// → "&lt;script&gt;alert(&#039;xss&#039;)&lt;/script&gt;"
// O navegador exibe o texto, mas NÃO executa o código


// ✅ Para SQL Injection → use PDO com prepared statements (veremos em breve)

$senha_digitada = "minhasenha123";

// NUNCA salve senha em texto puro ou com md5/sha1
// md5($senha) ❌ — quebrável em segundos

// ✅ Hash seguro — bcrypt por padrão
$hash = password_hash($senha_digitada, PASSWORD_DEFAULT);
// → "$2y$10$xK8j..." (hash diferente a cada execução, mesmo para a mesma senha)

// ✅ Verificação — nunca compare strings diretamente
$senha_do_banco = $hash; // veio do SELECT
if (password_verify($senha_digitada, $senha_do_banco)) {
    echo "Login correto!";
}

$usuarios = [
    ["id" => 1, "nome" => "Ana", "ativo" => true],
    ["id" => 2, "nome" => "Bruno", "ativo" => false],
    ["id" => 3, "nome" => "Carlos", "ativo" => true],
];

// Filtrar — retorna novo array só com ativos
$ativos = array_filter($usuarios, fn($u) => $u["ativo"] === true);

// Transformar — retorna só os nomes
$nomes = array_map(fn($u) => $u["nome"], $usuarios);
// → ["Ana", "Bruno", "Carlos"]

// Buscar por critério
$bruno = array_search("Bruno", array_column($usuarios, "nome"));

// Verificar existência
in_array("Ana", $nomes); // true

// Contar
count($usuarios); // 3

// filter_var é sua navaja suíça de validação
$email = "joao@email.com";
$idade = "25abc";
$url   = "https://ufpa.br";

// Valida formato
filter_var($email, FILTER_VALIDATE_EMAIL); // → "joao@email.com" ou false
filter_var($url,   FILTER_VALIDATE_URL);
filter_var($idade, FILTER_VALIDATE_INT);   // → false (por causa do "abc")

// Sanitiza (remove caracteres inválidos)
filter_var($email, FILTER_SANITIZE_EMAIL);

// Exemplo prático — função de validação que você usará no CRUD
function validarFormulario(array $dados): array {
    $erros = [];

    if (empty(trim($dados["nome"] ?? ""))) {
        $erros[] = "Nome é obrigatório.";
    }

    if (!filter_var($dados["email"] ?? "", FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }

    if (strlen($dados["senha"] ?? "") < 8) {
        $erros[] = "Senha deve ter ao menos 8 caracteres.";
    }

    return $erros; // array vazio = tudo certo
}



?>


