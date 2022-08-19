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
