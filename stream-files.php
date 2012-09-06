<?php
/*
    Stream - http://br.php.net/manual/pt_BR/book.stream.php
    http://br.php.net/manual/pt_BR/book.filesystem.php
    http://br.php.net/manual/pt_BR/ref.stream.php
*/
echo '<br>';
echo '<b>stream_set_timeout()</b><br>';
/*
    bool stream_set_timeout ( resource $stream , int $seconds [, int $microseconds = 0 ] )
    - Sets the timeout value on stream, expressed in the sum of seconds and microseconds
*/
//$fp = fsockopen("www.nogsantos.com.br", 80);
if (!$fp) {
    echo "Unable to open\n";
} else {
    fwrite($fp, "GET / HTTP/1.0\r\n\r\n");
    stream_set_timeout($fp, 2);
    $res = fread($fp, 2000);

    $info = stream_get_meta_data($fp);
    fclose($fp);

    if ($info['timed_out']) {
        echo 'Connection timed out!';
    } else {
        echo $res;
    }
}
echo '<br>';
echo '<b>fopen()</b><br>';
/*
     resource fopen ( string $filename , string $mode [, bool $use_include_path [, resource $context ]] )
     — Abre um arquivo ou URL
    
    'r' 	Abre somente para leitura; coloca o ponteiro do arquivo no começo 
            do arquivo.
    'r+' 	Abre para leitura e escrita; coloca o ponteiro do arquivo no começo
            do arquivo.
    'w' 	Abre somente para escrita; coloca o ponteiro do arquivo no começo do
            arquivo e reduz o comprimento do arquivo para zero. 
            Se o arquivo não existir, tenta criá-lo.
    'w+' 	Abre para leitura e escrita; coloca o ponteiro do arquivo no começo 
            do arquivo e reduz o comprimento do arquivo para zero. Se o arquivo 
            não existir, tenta criá-lo.
    'a' 	Abre somente para escrita; coloca o ponteiro do arquivo no final do
            arquivo. Se o arquivo não existir, tenta criá-lo.
    'a+' 	Abre para leitura e escrita; coloca o ponteiro do arquivo no 
            final do arquivo. Se o arquivo não existir, tenta criá-lo.
    'x' 	Cria e abre o arquivo somente para escrita; coloca o ponteiro no 
            começo do arquivo. Se o arquivo já existir, a chamada a fopen() 
            falhará, retornando FALSE e gerando um erro de nível E_WARNING. 
            Se o arquivo não existir, tenta criá-lo. Isto é equivalente a 
            especificar as flags O_EXCL|O_CREAT para a chamada de sistema open(2).
    'x+' 	Cria e abre o arquivo para leitura e escrita; coloca o ponteiro no 
            começo do arquivo. Se o arquivo já existir, a chamada a fopen() 
            falhará, retornando FALSE e gerando um erro de nível E_WARNING. 
            Se o arquivo não existir, tenta criá-lo. Isto é equivalente a 
            especificar as flags O_EXCL|O_CREAT para a chamada de sistema open(2). 
*/
$file = fopen("/var/www/learnphp/counter.txt", ’a+’);
echo $file;
if ($file == false) {
    die ("ERRO - Impossivel ler o arquivo.");
}
if (filesize("counter.txt") == 0) {
    $counter = 0;
} else {
    $counter = (int) fgets($file);
}
ftruncate($file, 0);
$counter++;
fwrite($file, $counter);
echo "There has been $counter hits to this site.";
echo '<br>';
echo '<b>feof()</b><br>';
/*
     bool feof ( resource $handle )
     Testa pelo fim-de-arquivo (eof) em um ponteiro de arquivo
*/
if (!file_exist ("counter.txt")) {
    throw new Exception ("The file does not exists");
}
$file = fopen("counter.txt", "r");
$txt = ’’;
while (!feof($file)) {
    $txt .= fread($file, 1);
}
echo "There have been $txt hits to this site.";
echo '<br>';
echo '<b>fseek()</b><br>';
/*
    int fseek ( resource $handle , int $offset [, int $whence ] )
    Modifica o indicador de posição do arquivo referenciado por handle. 
    A nova posição, medida em bytes a partir do início do arquivo, 
    é obtida ao adicionar offset à posição especificada por whence. 
    
    Valores de whence são:
        SEEK_SET - Define a posição igual ao offset bytes.
        SEEK_CUR - Define a posição para a atual localização mais offset.
        SEEK_END - Define a posição para o final do arquivo mais offset.
    Se whence não for especificado, é assumido que seja SEEK_SET.
*/
$fp = fopen('arquivo.txt');
// lê alguns dados
$data = fgets($fp, 4096);
// move de volta para o inicio do arquivo
// o mesmo que rewind($fp);
fseek($fp, 0);
echo '<br>';
echo '<b>fgetcsv()</b><br>';
/*
    array fgetcsv ( resource $handle [, int $length [, string $delimiter [, string $enclosure [, string $escape ]]]] )
    — Lê uma linha do ponteiro de arquivos e a interpreta como campos CSV
*/
$f = fopen(’file.csv’);
while ($row = fgetcsv($f)) {
// handle values
}
echo '<br>';
echo '<b>fputcsv()</b><br>';
/*
    int fputcsv ( resource $handle , array $fields [, string $delimiter [, string $enclosure ]] )
    — Formata a linha como CSV e a escreve em um ponteiro de arquivo
*/
$values = array("Davey Shafik", "http://zceguide.com", "Win Prizes!");
fputcsv($f, $values);
echo '<br>';
echo '<b>stream_socket_server()</b><br>';
/*
    resource stream_socket_server ( string $local_socket [, int &$errno [, string &$errstr [, int $flags = STREAM_SERVER_BIND | STREAM_SERVER_LISTEN [, resource $context ]]]] )
    Creates a stream or datagram socket on the specified local_socket.
*/
$socket = stream_socket_server("tcp://0.0.0.0:1037");
while ($conn = stream_socket_accept($socket)) {
    fwrite($conn, "Hello World\n");
    fclose($conn);
}
fclose($socket);
echo '<br>';
echo '<b>stream_socket_accept()</b><br>';
/*
     resource stream_socket_accept ( resource $server_socket [, float $timeout = ini_get("default_socket_timeout") [, string &$peername ]] )
     — Accept a connection on a socket created by stream_socket_server()
*/
echo '<br>';
echo '<b>stream_socket_client()</b><br>';
/*
      resource stream_socket_client ( string $remote_socket [, int &$errno [, string &$errstr [, float $timeout = ini_get("default_socket_timeout") [, int $flags = STREAM_CLIENT_CONNECT [, resource $context ]]]]] )
     — Open Internet or Unix domain socket connection
     connect to this simple “Hello World” server using stream_socket_client().
*/
$socket = stream_socket_client(’tcp://0.0.0.0:1037’);
while (!feof($socket)) {
    echo fread($socket, 100);
}
fclose($socket);
















