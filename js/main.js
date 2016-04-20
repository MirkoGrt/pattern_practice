// Function equal to PHP var_dump();
function dump(obj) {
    var out = '';
    for (var i in obj) {
        out += i + ": " + obj[i] + "\n";
    }

    var pre = document.createElement('pre');
    pre.innerHTML = out;
    return pre;
}

// Constructor for prototype lesson
function person (name, age, color) {
    this.name = name;
    this.age = age;
    this.color = color;
}

// Function to print array in div. (For merge sorting)
function arrayToDiv (array, div) {
    var divHtml="";
    jQuery.each(array, function(i, val) {
        divHtml += val + " - ";
        if (i == array.length - 1) {
            divHtml += "<br />";
        }
    });
    div.append(divHtml);
}