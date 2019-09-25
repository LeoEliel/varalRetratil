// Primeiro vamos fazer uma função p/ retornar o ID da cidade que queremos usar como parâmetro em requestURL
var resquestURL = 'http://apiadvisor.climatempo.com.br/api/v1/forecast/locale/5757/days/15?token=fcc72a6c209aa5e8b8d1e1954c00a0fd';
var request = new XMLHttpRequest();

request.open('GET', url);
request.responseType = 'json';
request.send();
request.onload = function(){
var result =  request.response();
}
