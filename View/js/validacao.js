
$.validator.addMethod("cnpjBR", function (value, element) {
    "use strict";

    if (this.optional(element)) {
        return true;
    }

    // Removing no number
    value = value.replace(/[^\d]+/g, "");

    // Checking value to have 14 digits only
    if (value.length !== 14) {
        return false;
    }

    // Elimina values invalidos conhecidos
    if (value === "00000000000000" ||
            value === "11111111111111" ||
            value === "22222222222222" ||
            value === "33333333333333" ||
            value === "44444444444444" ||
            value === "55555555555555" ||
            value === "66666666666666" ||
            value === "77777777777777" ||
            value === "88888888888888" ||
            value === "99999999999999") {
        return false;
    }

    // Valida DVs
    var tamanho = (value.length - 2);
    var numeros = value.substring(0, tamanho);
    var digitos = value.substring(tamanho);
    var soma = 0;
    var pos = tamanho - 7;

    for (var i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2) {
            pos = 9;
        }
    }

    var resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado !== parseInt(digitos.charAt(0), 10)) {
        return false;
    }

    tamanho = tamanho + 1;
    numeros = value.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;

    for (var il = tamanho; il >= 1; il--) {
        soma += numeros.charAt(tamanho - il) * pos--;
        if (pos < 2) {
            pos = 9;
        }
    }

    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado !== parseInt(digitos.charAt(1), 10)) {
        return false;
    }

    return true;

}, "Por favor, insira um número de CNPJ valido.");

$.validator.addMethod("dateBR", function (value, element) {
    "use strict";
    
    if (this.optional(element)) {
        return true;
    }
    
    //contando chars
    if (value.length !== 10) {
    	return false;
    }

        // verificando data
        var data = value;
        var dia = data.substr(0, 2);
        var barra1 = data.substr(2, 1);
        var mes = data.substr(3, 2);
        var barra2 = data.substr(5, 1);
        var ano = data.substr(6, 4);
        
        if (data.length !== 10 || isNaN(dia) || isNaN(mes) || isNaN(ano) || dia > 31 || mes > 12) {
        	return false;
        }
        if ((mes == 4 || mes == 6 || mes == 9 || mes == 11) && dia == 31) {
        	return false;
        }
        if (mes == 2 && (dia > 29 || (dia == 29 && (ano % 4 !== 0)))) {
        	return false;
        }
        if (ano < 1960) {
        	return false;
        }
    
        return true;
    

}, "Informe uma data válida"); 