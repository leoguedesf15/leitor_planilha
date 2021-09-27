<h1>Leitor de Planilhas e SQL Builder</h1>
<h2>OverView</h2>
<p>Este pequeno projeto é um exemplo de implementação de algoritmo com mais de 1 variabilidade.</p>
<p>Para resolver o problema foi utilizada uma adaptação do padrão de projetos Bridge</p>
<p>Temos a classe controladora (Reader.php) que tem suas filhas TmpCmpEspecificaReader.php TmpCmpGeralReader.php e TmpHabBnccReader.php. Reader delega às filhas para instanciarem os objetos correspondentes necessários a leitura e setarem seus atributos de acordo com a coluna especificada da planilha.</p>
<p>As filhas por sua vez se comunicam com a interface ReadStrategy que implementa qualquer Estratégia de leitura.(No caso do problema em questão, o cliente pediu pra que fosse considerado primordialmente o subtema, caso não houvesse subtema, considerasse o tema)</p>
<p>Em caso de haver qualquer outra estratégia, Criaria-se uma classe para cada estratégia. Essa classe implementaria ReadStrategy.php sobrescrevendo read() e aplicando a lógica desejada.</p>
<p>Cada Filho de Reader, separadamente, possui a sua Strategy, permitindo, aplicar uma strategy por cada Filho.</p>
<br>
<p>Para a construção da query temos uma adaptação do padrão Builder. A classe QueryBuilder encapsula uma variável query, do tipo string. Em Query Builder são declarados os métodos construtores de cada statement sql. Esses métodos incluem a lógica para concatenar a query com sua implementação e no fim, retorna o obj QueryBuilder a fim de que seja consumido como encadeamento com outros métodos.</p>
<p>O Consumo do builder está em QueryController.php no método mount()</p>
<p>QueryController controla a chamada dos métodos necessários da Builder, para devolver a saída do programa (uma query)</p>
<p>A saída por sua vez é entregue pra classe FileWriter que tem a responsabilidade de instanciar uma estratégia de Escrita e escrever no arquivo output.sql</p>
