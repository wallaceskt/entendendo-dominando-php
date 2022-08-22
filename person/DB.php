<?php
ini_set('display_errors', 1);

// Classe de conexão ao banco de dados
class Connect {

	// Atributo privado e estático
	private static $instance;

	// Método privado construtor vazio
	private function __construct() {}

	// Método personalizado estático
	public static function getConnection() {

		// Verifica se a variável já foi criada
		if (!isset(self::$instance)) {

			try {

				self::$instance = new PDO("sqlite:./persons.db",	"", "", array(
					PDO::ATTR_PERSISTENT => true, 
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				));

			} catch (PDOException $e) {

                $error = "";

				if ($e->getCode() == 0) {

					$error = "[ERRO {$e->getCode()}] Não foi possível encontrar o driver.";
					// Mostra uma mensagem e termina o script atual
					//exit("[ERRO {$e->getCode()}] Não foi possível encontrar o driver.");

				} elseif ($e->getCode() == 14) {

					$error = "[ERRO {$e->getCode()}] Incapaz de abrir o arquivo do banco de dados.";

				} elseif ($e->getCode() == 1045) {

					$error = "[ERRO {$e->getCode()}] Acesso negado ao usuário do banco de dados. Verifique o usuário e a senha.";

				} elseif ($e->getCode() == 1049) {

					$error = "[ERRO {$e->getCode()}] O banco de dados é desconhecido. Verifique o nome do banco de dados fornecido.";

				} elseif ($e->getCode() == 2002) {

					$error = "[ERRO {$e->getCode()}] Problemas com o servidor. Verifique se o nome do servidor foi fornecido corretamente e se o diretório existe.";

				} else {

					$error = "[ERRO {$e->getCode()}] {$e->getMessage()}";

				}

                return $error;

			}

		}

		return self::$instance;

	}

	/**
     * Determines if a variable is a Connect object
     *
     * @param mixed $value  the variable to check
     *
     * @return bool  whether $value is Connect object
     */
    public static function isError($value) {
        return is_object($value) && !is_a($value, 'Connect');
        // return is_object($value) && !($value instanceof Connect);
    }

}

// $con = Connect::getinstance();

// echo "<pre>";
// if ($con) {
// 	echo "Conectado";
// } else {
// 	echo "Desconectado";
// }

//$u = new Usuario($con);
//print_r($con);
//echo "</pre>";
?>