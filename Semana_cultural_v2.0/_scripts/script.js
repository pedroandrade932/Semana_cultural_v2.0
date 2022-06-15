// Obtém a data/hora atual
var data = new Date()

// Guarda cada pedaço em uma variável
var dia     = data.getDate()           // 1-31
var mes     = data.getMonth()          // 0-11 (zero=janeiro)
var ano4    = data.getFullYear()       // 4 dígitos

// Formata a data e a hora (note o mês + 1)
var str_data = dia + '/' + (mes+1) + '/' + ano4

//str_data = '14/6/2022'

if (str_data == '14/6/2022'){
    document.getElementById('form').innerHTML = '<form action="pross.php" method="POST"> <label for="nome"><p>insira o seu nome.<span style="color: red;">*</span></p></label> <input type="text" name="nome" id="nome" class="campo" maxlength="40" required autofocus>  <label for="e-mail"><p>insira o seu email.(Opcional)</p></label> <input type="email" name="email" id="e-mail" class="campo" maxlength="50"> <br><br> <input type="submit" value="Enviar" id="btn"> </form>'
}else{
    document.getElementById('form').innerHTML = '<p id="sen">O fomulário de inscrição do sorteio está desativado até o dia 14/06.</p>'
}
