function ShowLength( str ) {
        str = str.replace(/\n/g, '  ');
    var last1 = str.charAt(str.length-1);
    var last2 = str.charAt(str.length-2);
    var num = str.length;
    var total = 0;

    for (i=1; str.charAt(str.length-i)==' '; i++) {
        total =  i;
    }
    num = num - total;

    document.getElementById("inputlength").innerHTML = num ;
}
