# Entendendo e Dominando PHP
### PHP 5 Objects, Patterns, Practice
```php
Autor = Matt Zandstra
```
---

## Introdução
### PHP: Projeto e gerência

O conceito de padrão de projeto como uma forma de descrever um problema com a essência de sua solução foi discutido pela primeira vez em 1970.

A ideia foi desenvolvida no campo da arquitetura.

No início da década de 1990, os programadores orientados a objetos estavam utilizando a mesma técnica para nomear e descrever problemas de projeto de software.

A Programação eXtrema (XP), advogada por Kent Beck, é um tipo de abordagem a projetos que incentiva o planejamento e a execução flexíveis, orientatos a objeto e altamente enfocados.

Na XP os testes são cruciais ao sucesso de um projeto. Os testes devem ser automatizados, executados frequentemente e, de preferência, projetados antes que o código alvo seja escrito.

Um dos princípios da XP amplamente aproveitados foi a revisão de código (refatoração). Ela foi um auxiliar poderoso para os padrões.

A importância dos testes automatizados foi ainda mais destacada pelo lançamento da poderosa plataforma de testes JUnit (Java).

Livros:
1. *Design Patterns: Elements of Reusable Object-Oriented Software*, escrito pela Gang of Four, e publicado em 1995.
2. *The Pragmatic Programmer*, de Andrew Hunt e David Thomas, publicado em 2000.
3. *Refactoring: Improving the Design of Existing Code*, escrito por Martin Fowler, publicado em 1999 e que definiu a área de refatoração de código.

Artigos:
1. *Test Infected: Programmers Love Writing Tests*, de Kent Beck e Erich Gamma. Leia: [Source Forge - Test Infected](http://junit.sourceforge.net/doc/testinfected/testing.htm)
2. Leo Atkinson escreveu sobre PHP e padrões para a ZEND em 2001.
3. Harry Fuecks lançou seu [diário](http://www.phppatterns.com) em 2002.

## Objetos

### Fundamentos de objetos

Classes são frequentemente definidas em termos de objetos. Isso é interessante porque objetos são, muitas vezes, definidos em termos de classes.

Classe é um modelo de código usado para gerar objetos. Exemplo de classe:

```php
class ShopProduct {
    // corpo da classe
}
```

Objeto são dados estruturados de acordo com o modelo definido em uma classe. Um objeto é chamado de instância de sua classe. Ele é do tipo definido pela classe.

A classe `ShopProduct` é como um molde para gerar objetos `ShopProduct`. Para tanto, é necessário o operador `new`. Exemplo:

```php
$product1 = new ShopProduct();
$product2 = new ShopProduct();
```

Os objetos criados são funcionalmente idênticos (ou seja, vazios), mas são objetos diferentes do mesmo tipo, gerados a partir de uma única classe.

#### Configurando propriedades em uma classe

Classes podem definir variáveis especiais chamadas propriedades. Uma propriedade, também conhecida como variável membro, armazena dados que podem variar de objeto para objeto.

Uma propriedade em  uma classe se diferencia de uma variável padrão pelo fato de sua declaração e atribuição ser precedida por uma palavra-chave de acesso. Ela pode ser `public`, `protected` ou `private` e determina o escopo a partir da propriedade que pode ser acessada.

> Observação: escopo refere-se ao contexto da função ou da classe em que a variável possui significado. Assim, uma variável definida em uma função existe em escopo local e uma variável definida fora da função existe em escopo global. Como uma regra básica, não é possível acessar dados definidos em um escopo que seja mais local do que o corrente, ou seja, a variável de dentro de uma função não pode ser acessada de fora dela. Os objetos são mais permeáveis, no sentido em que algumas variáveis objeto podem, às vezes, ser acessadas a partir de outros contextos. Quais variáveis podem ser acessadas em qual contexto são determinadas pelas palavras-chave `public`, `protected` e `private`.

O exemplo abaixo mostra quatro propriedades com um valor padrão atribuído a cada uma delas.

```php
class ShopProduct {
    public $title = "default product";
    var $producerMainName = "main name";
    private $producerFirstName = "first name";
    protected $price = 0;
}
```

A palavra-chave `public` assegura que se pode acessar a propriedade de fora do contexto do objeto. Acesso público é a configuração padrão para métodos (que será visto mais a frente) e para propriedades se for usada a antiga palavra-chave `var` na sua declaração de propriedade.

Um método ou propriedade privados só podem ser acessados dentro da classe. Até mesmo subclasses (classe-filha) não têm acesso.

Um método ou propriedade protegidos só podem ser acessados de dentro da classe ou de uma subclasse. Nenhum código externo pode acessá-los.

O controle de acesso permite expor apenas aqueles aspectos de uma classe que sejam requeridos por um cliente. Isso estabelece uma interface clara para o seu objetivo.

Evitando que um cliente acesse determinadas propriedades, o controle de acesso também ajuda a evitar falhas no código.

Como uma regra geral, erre para o lado da privacidade. Torne as propriedades privadas ou protegidas primeiro e relaxe sua restrição apenas quando necessário.

#### Trabalhando com métodos

Os métodos permitem aos seus objetos executar tarefas. São funções especiais declaradas dentro de uma classe. Exemplo:

```php
public function myMethod($argument, $another) {
    // ...
}
```

Os métodos podem receber um número de qualificadores, incluindo palavras-chave de controle de acesso. Da mesma forma que as propriedades, os métodos podem ser declarados como `public`, `protected` ou `private`. Declarando um método como `public`, asseguramos que ele possa ser chamado de fora do objeto corrente. Se a palavra-chave de controle de acesso for omitida na sua declaração de método, este será declarado `public` implicitamente.

Na maioria das circunstâncias, um método será chamado usando uma variável objeto na conjunção com `->`, e o nome do método acrescido de parênteses. Exemplo:

```php
$myObj = new MyClass();
$myObj->myMethod("Harry", "Palmer");
```

A pseudo-variável `$this` é o mecanismo por meio do qual uma classe pode se referir a uma instância de objeto. `$this` pode ser entendida como "a instância corrente".

```php
$this->producerFirstName;
```

O trecho acima pode ser traduzido para a propriedade $producerFirstName da instância corrente.

#### Criando um método construtor

Um método construtor é chamado quando um objeto é criado usando o operador `new`. É usado para configurar coisas, assegurando que as propriedades essenciais sejam configuradas e qualquer trabalho preliminar necessário seja completo. O método construtor deve ser nomeado como `__construct()` e pode ou não receber parâmetros.

#### Argumentos e tipos

Todos os dados em PHP possuem um tipo. O tipo determina a forma pela qual os dados podem ser gerenciados nos seus scripts. Em um nível mais alto, entretanto, uma classe define um tipo. Um objeto `ShopProduct`, portanto, pertence so tipo primitivo `object`, mas também pertence ao tipo de classe `ShopProduct`.

Definições de funções e métodos não necessariamente requerem que um argumento seja de determinado tipo. O fato de que um argumento possa ser de qualquer tipo lhe oferece flexibilidade. Pode-se construir métodos que respondam de forma inteligente a diferentes tipos de dados, ajustando a funcionalidade a circunstâncias dinâmicas. Essa flexibilidade também pode causar ambigüidade no código quando um corpo de método espera que um argumento possua um tipo, mas obtém outro.

##### Tipos primitivos

O PHP é uma linguagem fracamente tipada. Isso significa que não há necessidade de que uma variável seja declarada para armazenar determinado tipo de dado.

Isso não significa que o PHP não tenha conceito de tipo. Cada valor que puder ser atribuído a uma variável possui um tipo. Pode-se determinar o tipo do valor de uma variável usando uma das funções de verificação de tipos do PHP. Tipos de primitivos reconhecidos em PHP e suas funções de teste correspondentes:

| Função de verificação de tipo | Tipo | Descrição |
| ---------- | ---------- | ---------- |
| is_bool() | Boolean | Um dos dois valores especiais `true` ou `false`. |
| is_integer() | Integer | Un múmero inteiro. |
| is_double() | Double | Um número de ponto flutuante (um número com ponto decimal). |
| is_string() | String | Dados caracteres. |
| is_object() | Object | Um objeto. |
| is_array() | Array | Uma matriz. |
| is_resource() | Resource | Um manipulador para identificar e trabalhar com fontes externas, como bancos de dados ou arquivos. |
| is_null() | NULL | Um valor não atribuído. |

Verificar o tipo de uma variável pode ser especialmente importante quando você trabalha com argumentos de métodos e funções.

##### Herança

A herança é um mecanismo pelo qual uma ou mais classes podem ser derivadas de uma classe.

Uma classe herdeira de outra é chamada subclasse. Esse relacionamento é muitas vezes descrito em termos de mãe e filhas. Uma classe-filha é derivada de e herda características (propriedades e métodos) da mãe.

A classe-filha geralmente adicionará funcionalidade além da que é fornecida pela sua mãe (também conhecida como superclasse); por esse motivo, uma classe filha é dita "estendendo" sua mãe.

O primeiro passo na construção de uma árvore de herança é encontrar elementos da classe base que não se adaptem juntos, ou que precisem ser manipulados de forma diferente.

Para criar uma classe-filha, deve-se usar a palavra-chave `extends` na declaração da classe. Exemplo:

```php
class CdProduct extends ShopProduct {
    // ...
}
```

Devido ao fato de as classes derivadas não definirem construtores, o construtor da classe-mãe é chamado automaticamente quando são instanciadas. As classes-filhas herdam o acesso a todos os métodos públicos e protegidos da mãe.

Classes derivadas podem estender, mas também alterar a funcionalidade das suas classes-mães. Ao mesmo tempo, cada classe herda as propriedades das suas classes-mães.

Definindo uma classe que estenda outra, assegura-se que um objeto instanciado seja definido pelas características primeiro da classe-filha e depois da classe-mãe.

###### Construtores e herança

Quando se define um construtor em uma classe-filha, torna-se responsável por passar quaisquer argumentos para a mãe. Se não fizer isso, pode acabar com um objeto parcialmente construído.

Para chamar um método em uma classe-mãe, deve-se, primeiro, encontrar uma forma de se referir à própria classe: um "manipulador". O PHP fornece a palavra-chave `parent` para esse propósito.

Para se referir a um método no contexto de uma classe, em vez de em um objeto, usa-se `::` no lugar de `->`. Assim:

```php
parent::__construct()
```

Esse código significa: "Chame o método `__construct()` da classe-mãe".

Cada classe-filha chama o construtor de sua mãe antes de configurar suas próprias propriedades. A classe base agora só conhece seus próprios dados. Classes-filhas geralmente são especializações das suas mães. Como uma regra básica, deve-se evitar dar a classes-mães algum conhecimento especial sobre suas filhas.

###### Chamando um método anulado

A palavra-chave `parent` pode serusada com qualquer método que anule sua contraparte em uma classe-mãe. Quando se anula um método, pode-se não querer suprimir a funcionalidade da mãe, mas sim estendê-la. Pode-se obter isso chamando o método na classe-mãe no contexto corrente do objeto. Exemplo:

```php
// Classe ShopProduct ...
    function getSummaryLine() {
        $base = "{$this->title}" . " ({$this->producerMainName}, ";
        $base .= "{$this->producerFirstName})";

        return $base;
    }

// Classe CdProduct ...
    function getSummaryLine() {
        // Chama o método da classe-mãe antes de prosseguir e adicionar mais dados à string
        $base = parent::getSummaryLine();
        $base .= ": playing time - {$this->playLength})";
        return $base;
    }
```

###### Métodos de acesso

Mesmo quando é preciso trabalhar com valores armazenados pela sua classe, é uma boa ideia negar acesso direto a propriedades, fornecendo métodos que repassem os valores necessários. Tais métodos são conhecidos como métodos de acesso, ou "leitores e gravadores".

Um método de acesso pode ser usado para filtrar um valor de propriedade de acorso com as circunstâncias. Exemplo:

```php
// Classe BookProduct
    function getPrice() {
        return $this->price();
    }
```

Também pode-se usar um método de gravação para impor um tipo de propriedade. Exemplo:

```php
// Classe ShopProductWriter
    private $products = array();

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    public function write() {
        // ...
    }
```

Definir a propriedade `$products` como privada torna impossível para o código externo danificá-la pela adição de um tipo de objeto errado. Os acessos acontecem pelo método `addProduct()` e a dica do tipo da classe usada na declaração do método assegura que apenas objetos `ShopProduct` possam ser adicionados à propriedade matriz.

### Recursos avançados

#### Métodos e propriedades estáticos

Até aqui ficou caracterizado que as classes são como modelos a partir dos quais os objetos são produzidos e os objetos como componentes ativos; elementos cujos métodos chamamos e cujas propriedades acessamos. É possível deduzir que a ação na programação orientada a objetos deve ser encontrada pelas instâncias das classes. As classes, afinal, são apenas modelos para objetos.

Na verdade, não é tão simples. Pode-se acessar tanto métodos quanto propriedades no contexto de uma classe, e não de um objeto. Tais métodos e propriedades são "estáticos" e devem ser declarados como tais usando a palavra-chave `static`. Veja:

```php
class StaticExemple {
    static public $aNum = 0;

    static public function sayHello() {
        print "Hello";
    }
}
```

Devido ao fato de acessar um elemento estático por meio de uma classe, e não de uma instância, não há necessidade de uma variável que referencie um objeto. Ao contrário, usa o nome da classe com `::`. Veja:

```php
print StaticExemple::$aNum;
print StaticExemple::sayHello();
```

Para acessar um método ou propriedade estática a partir do interior de uma mesma classe (e não da filha), usa-se a palavra-chave `self`; `self` é para as classes o que a pseudo-variável `$this` é para objetos. Assim, de fora da classe `StaticExemple` acessa-se a propriedade `$aNum` usando seu nome de classe.

De dentro da classe `StaticExemple` pode-se usar a palavra-chave `self`:

```php
class StaticExemple {
    static public $aNum = 0;

    static public function sayHello() {
        self::$aNum++;
        print "Hello (" . self::$aNum . ")\n";
    }
}
```

Por definição, métodos estáticos não são chamados no contexto de um objeto. Daí, não poder usar a pseudo-variável `$this` dentro de um método estático sem causar um erro fatal.

A razão do uso de um método ou propriedade estática consiste:
- primeiro, no fato de que eles estão disponíveis a partir de qualquer lugar no script (presumindo que se tenha acesso à classe). Isso significa que se pode acessar a funcionalidade sem precisar passar uma instância de classe de objeto para objeto, ou, pior ainda, armazenar uma instância em uma variável global.
- segundo, no fato de uma propriedade estática ficar disponível a todas as instâncias de uma classe, de forma que se possa configurar os valores que quiser, desde que fiquem disponíveis para todos os membros de um tipo.
- finalmente, no fato de que não necessita de uma instância para acessar uma propriedade ou método estático pode evitar que se instancie um objeto apenas para obter uma simples função.

#### Propriedades constantes

Algumas propriedades nnao podem ser alteradas. Sinalizações de erro e de status, muitas vezes, serão codificadas explicitamente nas suas classes. Embora elas devam ser pública e estaticamente disponíveis, o código cliente não deve alterá-las.

O PHP 5 permite que se defina propriedades constantes dentro de uma classe. Da mesma forma que é feito com constantes globais, constantes de classes não podem ser alteradas assim que estiverem configuradas. Uma propriedade constante é declarada com a palavra-chave `const`. As constantes não são prefixadas com um sinal de cifrão, como as propriedades regulares. Por convenção, elas são, muitas vezes, nomeadas usando apenas letras maiúsculas:

```php
class ShopProduct {
    const AVAILABLE = 0;
    const OUT_OF_STOCK = 1;
    // ...
```

Propriedades constantes podem conter apenas valores primitivos. Um objeto não pode ser atribuído a uma constante. As constantes são acessadas por meio da classe, e não por uma instância. Refere-se a uma constante sem um sinal de cifrão:

```php
print ShopProduct::AVAILABLE;
```

Usa-se constantes quando sua propriedade precisa estar disponível por todas as instâncias de uma classe e quando o valor da propriedade precisa ser estabelecido e não mudar.

#### Classes abstratas

Uma classe abstrata não pode ser instanciada. Em vez disso, ela define (e, opcionalmente) a interface de qualquer classe que possa estendê-la.

Uma classe abstrata é definida com a palavra-chave `abstract`. Exemplo:

```php
abstract class ShopProductWriter {
    // ...
}
```

Na maioria dos casos, uma classe abstrata terá pelo menos um método abstrato. Estes são declarados mais uma vez com a palavra-chave `abstract`. Um método abstrato não pode ter uma implementação. Ele é declarado como normal, mas termina com um ponto e vírgula, e não com um corpo de método. Exemplo:

```php
abstract class ShopProductWriter {
    // ...
    abstract public function write();
}
```

Na criação de um método abstrato, assegura-se que uma implementação estará disponível em todas as classes-filhas concretas, mas com os detalhes dessa implementação indefinidos.

Assim, qualquer classe que estenda uma classe abstrata deve implementar todos os métodos abstratos ou deve, ela mesma, ser declarada como abstrata. Uma classe que a estenda é responsável por mais do que simplesmente implementar um método abstrato. Ao fazê-lo, ela deve reproduzir a assinatura do método. Isso significa que o controle de acesso do método implementado não pode ser mais rigoroso do que o do método abstrato. O método implementado também deve requerer o mesmo número de argumentos do método abstrato, reproduzindo todas as dicas de tipos de classe. Exemplo:

```php
abstract class ShopProductWriter {
    // ...
    abstract public function write();
}

class XmlProductWriter extends ShopProductWriter {
    // ...
    public function write() {
        // ...
    }
}

class TextProductWriter extends ShopProductWriter {
    // ...
    public function write() {
        // ...
    }
}
```

#### Interfaces

Enquanto as classes abstratas permitem o fornecimento de alguma medida de implementação, as interfaces são modeos puros. Uma interface só pode definir funcionalidade, nunca pode implementá-la. Uma interface é declarada com a palavra-chave `interface`. Ela pode conter declarações de propriedades e métodos, mas não corpos de métodos. Exemplo:

```php
interface Chargeable {
    public function getPrice();
}
```

Qualquer classe que incorpore essa interface compromete-se a implementar todos os métodos que ela definir e deve ser declarada como abstrata.

Uma classe pode implementar uma interface usando a palavra-chave `implements` na sua declaração. Exemplo:

```php
class ShopProduct implements Chargeable {
    // ...
    public function getPrice() {
        // ...
    }
    // ...
}
```

A implementação de uma interface pode ser útil pelo tipo. Uma implementação de classe recebe o tipo da classe que ela estende e a interface que ela implementa. Assim, uma classe `CdProduct` pertence a:

```
CdProduct
ShopProduct
Chargeable
```

Uma classe pode estender uma superclasse e implementar qualquer número de interfacer. A cláusula `extends` deve preceder a cláusula `implements`:

```php
class Consultancy extends TimedService implements Bookable, Chargeable {
    // ...
}
```

Múltiplas interfaces seguem a palavra-chave `implements` em uma lista separada por vírgulas.

PHP suporta apenas a herança de uma única mãe, de modo que a palavra-chave `extends` só pode preceder um único nome de classe.

#### Manipulação de erros

##### Exceções

Exceções abordam todas as questões que levantamos até agora.

Uma exceção é um objeto especial, instanciado a partir da classe interna `Exception` (ou de uma classe derivada). Objetos do tipo `Exception` são projetados para armazenar e relatar informações sobre erros.

O construtor da classe `Exception` recebe dois argumentos opcionais, uma string de mensagem e um código de erro. A classe fornece alguns métodos úteis para analisar condições de erro, descritos na tabela abaixo:

| Método | Descrição |
| ---------- | ---------- |
| getMessage() | Obtém a string da mensagem passada para o construtor. |
| getCode() | Obtém o código do tipo inteiro passado para o construtor. |
| getFile() | Obtém o arquivo no qual a exceção foi gerada. |
| getTrace() | Obtém uma matriz multidimensional registrando as chamadas ao método que levaram à exceção, incluindo método, classe, arquivo e dados de argumentos. |
| getTraceAsScript() | Obtém uma versão string dos dados retornados por `getTrace()`. |
| __toString() | Chamado automaticamente quando o objeto `Exception` é usado no contexto de string. Retorna uma string descrevendo os detalhes da exceção. |

A classe `Exception` é fantasticamente útil para fornecer notificação de erros e informações para depuração (os métodos `getTrace()` e `getTraceAsString` são especialmente úteis quanto a isso).

###### Gerando uma exceção

A palavra-chave `throw` é usada com um objeto `Exception`. Ela para a execução do método corrente e passa a responsabilidade pela manipulação de erros de volta ao código solicitante. Exemplo:

```php
public function connect() {
    $this->db = Connect::getInstance();
    if (Connect::isError($this->db)) {
        throw new Exception("A connection error occured");
    }
}
```

Ao chamar um método que talvez gere uma exceção, pode-se envolver sua chamada em uma cláusula `try`. Uma cláusula `try` é criada em torno da palavra-chave `try` seguida por chaves. Auma cláusula `try` deve ser seguida por pelo menos uma cláusula `catch` na qual pode-se manipular quaisquer erros, desta forma:

```php
try {
    // ...
} catch (Exception $e) {
    die($e->__toString());
}
```

Quando uma exceção é gerada, a cláusula `catch` no escopo da solicitação e chamada. O objeto `Exception` é automaticamente passado para a variável do argumento.

Assim como a execução é parada dentro do método que gera a exceção, quando uma ocorre, também o é dentro da cláusula `try`; o controle passa diretamente para a cláusula `catch`.

###### Subclasses de exceções

Pode-se criar classes que estendam `Exception` da mesma forma que se faz com qualquer classe definida pelo usuário. Existem duas razões:

- estender a funcionalidade da classe.
- uma classe derivada define um novo tipo de classe que pode ajudar na manipulação de erros.

Pode-se definir quantas cláusulas `catch` precisar para uma declaração `try`. A cláusula `catch` específica depende do tipo da exceção gerada e da dica de tipo de classe na lista de argumentos. Exemplo:

```php
class DbException extends Exception {
    // ...
}

class DbConnectionException extends DbException {}
class SqlException extends DbException {}
```

Uma abordagem que pode gerar uma exceção implícita ou escondida tende a dificultar o rastreamento do que está acontecendo no código. Veja:

```php
// Classe PersonPersist ...
    public function connect() {
        $this->db = Connect::getInstance();
        if (Connect::isError($this->db)) {
            throw new Exception("A connection error occured");
        }
    }

    public function insert(Person $person) {
        if (empty($this->db)) {
            $this->connect();
        }

        // ...

        if (Connect::isError($insert_result)) {
            throw new SqlException($insert_result);
        }

        // ...
    }
}
```

Uma outra abordagem é explícita. Usar o par `try/catch` é redundante, mas possui a virtude da clareza. Veja:

```php
public function insert(Person $person) {
    try {
        if (empty($this->db)) {
            $this->connect();
        }
    } catch (DbConnectionException $e) {
        throw $e;
    }
    // ...
}
```

Gerando uma de duas possíveis exceções:

```php
try {
    $saver = new PersonPersist("sqlite:./persons.db");
    $saver->insert($person);
} catch (DbConnectionException $e) {
    // Erro de conexão:
    // Talvez tentar novamente com um novo Data Source Name
    print $e->__toString();
}
} catch (SqlException $e) {
    // Erro durante a inserção
    // Tabela não existe ou o seu esquema não equivale aos campos
    print $e->__toString();
}
} catch (Exception $e) {
    // Não deveria ser chamada corretamente
    print $e->__toString();
}
```

A cláusula chamada depende do tipo da exceção gerada. O primeiro equivalente será executado, então, é importante colocar o tipo mais genérico no final e o mais especializado no início.

Uma exceção deve ser gerada quando um método tiver detectado um erro, mas não possuir informação contextual para poder manipulá-la e forma inteligente.

#### Classes e métodos finais

A herança permite enorme flexibilidade dentro de uma hierarquia de classes. Às vezes, no entanto, uma clásse ou método deve permanecer sem mudanças. Se já se tem a funcionalidade definitiva para uma classe, ou método, e sobrescrevê-la pode apenas danificar a perfeição do seu trabalho, talvez precise da palavra-chave `final`, que coloca um final na herança. Uma classe `final` não pode ter subclasses. Menos dramaticamente, um método `final` não pode ser sobrescrito. Exemplo:

```php
final class Checkout {
    // ...
}
```

Qualquer tentativa de driar uam subclasse da classe `Checkout` causará um erro fatal.

Pode-se relaxar um pouco e declarar um método `final` em `Checkout`, em vez de fazê-lo com a classe inteira. A palavra-chave `final` deve ser colocada na frente de quaisquer modificadores, como `protected` ou `static`.

```php
class Checkout {
    final function totalize() {
        // ...
    }
}
```

Um bom código orientado a objetos tende a enfatizar a interface bem definida. Por trás da interface, entretanto, as implementações muitas vezes variarão. Diferentes classes ou combinações de classes adaptam-se a interfaces comuns, mas se comportam de forma diferente em situações diferentes. Declarando uma classe ou método como `final`, essa flexibilidade é limitada. Contudo, deve-se pensar com cautela antes de declarar algo como `final`.

#### Trabalhando com interceptadores

O PHP fornece métodos interceptadores internos, que podem interceptar mensagens enviadas para métodos e propriedades não definidas. Isso também é conhecido como "sobrecarga", ma, já que esse termo significa algo bastante diferente em Java e C++, melhor falar em termos de interceptação.

O PHP 5 suporta três métodos internos de sobrecarga. Como o `__construct()`, eles são chamados quando as condições corretas são satisfeitas.

| Método | Descrição |
| ---------- | ---------- |
| `__get($property)` | Chamado quando uma propriedade indefinida é acessada. |
| `__set($property, $value)` | Chamado quando um valor é atribuído e uma propriedade indefinida. |
| `__call($method, $arg_array)` | Chamado quando um método indefinido é habilitado. |

Os métodos `__get()` e `__set()` são projetados para trabalhar com propriedades que não tiverem sido declaradas em uma classe (ou nas suas ancestrais).

O `__get()` é chamado quando o código cliente tenta ler uma propriedade não delcarada. Ele é chamado automaticamente com um único argumento string contendo o nome da propriedade que o cliente estiver tentando acessar. O que quer que se retorne do método `__call()` será enviado para o cliente como se a propriedade alvo existir com esse valor.

```php
class Person {
    function __get($property) {
        $method = "get{$property}";
        if (method_exists($this, $method)) {
            return $this->$method;
        }
    }

    function getName() {
        return "Bob";
    }

    function getAge() {
        return 43;
    }
}
```

O método `__set()` é chamado quando o código cliente tenta atribuir a uma propriedade não definida. Ele recebe dois argumentos: o nome da propriedade e o valor que o cliente está tentando gravar. Pose-se, então, decidir como trabalhar com esses argumentos. Veja:

```php
class Person {
    private $_name;
    private $_age;

    function __set($property, $value) {
        $method = "set{$property}";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
    }

    function getName($name) {
        $this->_name = strtoupper($name);
    }

    function getAge($age) {
        $this->_age = strtoupper($age);
    }
}
```

O método `__call()` é, provavelmente, o mais útil de todos os métodos interceptadores. Ele é chamado quando um método não definido é habilitado pelo código cliente. O `__call()` é chamado com o nome do método e uma matriz que armazena todos os argumentos passados pelo cliente. Qualquer valor que você retorne do método `__call()` é retornado para o cliente como se tivesse sido feito pelo método chamado.

O método `__call()` pode ser útil para a delegação. Delegação é o mecanismo por meio do qual um objeto passa chamadas de métodos. Ele é semelhante à herança no sentido em que uma classe-filha passa uma chamada de método para sua implementaçnao ancestral. Com herança, o relacionamento entre filha e mãe é fixo, então, o fato de que você pode alternar o objeto recebido em tempo de execução significa que a delegação pode ser mais flexível do que a herança. Veja uma classe para formatar informações da classe `Person`:

```php
class PersonWriter {
    function writeName(Person $p) {
        print $p->getName() . "\n";
    }

    function writeAge(Person $p) {
        print $p->getAge() . "\n";
    }
}
```

Veja a implementação da classe `Person`:

```php
class Person {
    private $writer;

    function __construct(PersonWriter $writer) {
        $this->writer = $writer;
    }

    function __call($methodname, $args) {
        if (method_exists($this->writer, $methodname)) {
            return $this->writer->$methodname($this);
        }
    }

    function getName() {return "Bob";}
    function getNAge() {return 44;}
}
```

A classe `Person` demanda um objeto `PersonWriter` como argumento do construtor e o armazena em uma variável de propriedade. No método `__call()`, usa-se o argumento `$methodname` fornecido, testando um método do mesmo nome no objeto `PersonWriter` que armazenamos. Se o método for encontrado, delega-se a chamada do método ao objeto `PersonWriter`, passando a instância corrente para ele (na pseudo-variável `$this`). Assim, o cliente faz a chamada a `Person`:

```php
$person = new Person(new PersonWriter());
$person->writeName();
```

O método `__call()` é chamado. Um método chamado `writeName()` é encontrado no seu objeto `PersonWriter` e o é chamado. Isso evita que o método delegado seja chamado manualmente. Veja:

```php
function writeName() {
    $this->writer->writeName($this);
}
```

A classe `Person` ganhou dois novos métodos. Embora a delegação automatizada possa economizar  muito trabalho, caso se precise delegar para muitos métodos, há um custo quanto à clareza. Apresenta-se ao mundo uma interface dinâmica que resistirá à reflexão (o exame de tempo de execução de aspectos de classe) e não será clara para o codificador cliente à primeira vista. Os métodos interceptadores possuem seu lugar, mas devem ser usados com cautela. As classes que se baseiam neles devem documentar esse fato com muita clareza.

#### Definindo métodos destrutores

O método `__destruct()` é chamado antes de um objeto sofrer a coleta de lixo, ou seja, antes de ser apagado da memória. Esse método pode ser usado para executar qualquer limpeza que possa ser necessária.

Numa classe que grava a si mesma num banco de dados, quando for solicitada, pode-se usar o método `__destruct()` para assegurar que essa instância grave seus dados quando for apagada:

```php
class Person {
    // ...
    function __destruct() {
        if (!empty($this->id)) {
            // save Person data
            print "saving person\n";
        }
    }
}
```

O método `__destruct()` é chamado sempre que um objeto for removido da memória. Isso acontecerá quando a função `unset()` com o objeto em questão for chamada ou quando nenhuma referência ao objeto existir no processo. Exemplo:

```php
$person = new Person("Bob", 44);
$person->setId(343);
unset($person);
// saída:
// gravando $person
```

#### Copiando objetos com __clone()

O PHP 5 fornece a palavra-chave `clone` apenas para as ocasiões em que houver a necessidade de se obter uma cópia de um objeto, em vez de uma referência a ele.

O `clone` opera sobre uma instância de objeto, produzindo uma cópia por valor:

```php
class Person {}
$p1 = new Person("Bob", 44);
$p2 = clone $p1;
// Agora, $p2 e $p1 são 2 objetos distintos
```

Não é tudo. A cópia do objeto `$p1` conteria o identificador (a propriedade `$id`) que em uma implementação integral seria usada para localizar o registro em um banco de dados. Uma alteração num objeto afetará o outro, e vice-versa.

Felizmente, pode-se controlar o que é copiado quando um `clone` é chamado sobre um objeto. Isso é feito implementando um método especial chamado `__clone()`. O `__clone()` é chamado automaticamente quando a palavra-chave é chamada em um objeto.

Quando `__clone()` é implementado é importante compreender que ele é executado sobre o objeto copiado e não sobre o original. 

```php
class Person {
    // ...
    function __clone() {
        $this->id = 0;
    }
}
```

Quando `clone` é chamado sobre um objeto `Person`, uma nova cópia superficial é feita, e seu método `__clone()` é chamado. Isso significa que qualquer coisa que se faça em `__clone()` sobrescreve a cópia padrão já feita. No exemplo, o `$id` do objeto copiado será zero:

```php
$person = new Person("Bob", 44);
$person->setId(343);
$person2 = clone $person;
// $person2 :
//  name: Bob
//  age: 44
//  id: 0
```

Uma cópia superficial assegura que propriedades primitivas sejam copiadas do objeto antigo para o novo. Propriedades de objetos são copiadas por referência, o que pode não ser o que se espera ao clonar um objeto. Considere-se que o objeto `Person` tenha uma propriedade de objeto `Account`. Esse objeto armazena um saldo que se queira copiar para o objeto clonado. O que não se quer é que ambos os objetos `Person` armazenem referências para a mesma conta:

```php
class Account {
    public $balance;
    function __construct($balance) {
        $this->balance = $balance;
    }
}

class Person {
    private $name;
    private $age;
    private $id;
    private $account;

    function __construct($name, $age, Account $account) {
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    function setId($id) {
        $this->id->$id;
    }

    function __clone() {
        $this->id = 0;
    }
}

$person = new Person("Bob", 44, new Account(200));
$person->setId(343);
$person2 = clone $person;

// dá a $person algum dinheiro
$person->account->balance += 10;
// $person2 vê o crédito também
print $person2->account->balance;

// saída:
// 210
```

Para que uma propriedade de objeto não seja compartilhada após uma operação de clonagem é necessário cloná-la explicitamente no método `__clone()`:

```php
function __clone() {
    $this->id = 0;
    $this->account = clone $this->account;
}
```

#### Definindo valores de strings para seus objetos

Implementando o método `__toString()`, pode-se controlar a forma pela qual seus objetos representam a si próprios ao serem imprimidos. O `__toString()` deve ser escrito para retornar um valor string. O método é chamado automaticamente quando seu objeto é passado para `print` ou `echo` e seu valor de retorno é subtituído. Adicionando uma versão `__toString()` à uma classe `Person` mínima:

```php
class Person {
    function getName() {return "Bob";}
    function getAge() {return 44;}
    function __toString() {
        $desc = $this->getName();
        $desc .= " (age " . $this->getAge() . ")";
        return $desc;
    }
}

$person = new Person();
print $person;
// saída:
// Bob (age 44)
```

O método `__toString()` é especialmente para registros e relatórios de erros e para classes cuja tarefa principal seja mostrar informaçnoes. A classe `Exception`, por exemplo, resume os dados da exceção no seu método `__toString()`.