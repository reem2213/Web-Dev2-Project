let store_option=document.getElementById('store_option')
let products_options=document.getElementById('products_options')




function getproducts(products){
    var array=[];

    // Loop through optionsData and create option elements
    array.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.text = option.name;
        optionElement.value = option.id;
        products_options.appendChild(optionElement);
        });

    store_option.addEventListener('change',function () {
        for(i=0;i<products.length;i++){
            if(products[i].store_id==store_option.options[store_option.selectedIndex].value){
                array.push(products[i])
            }
            // console.log(products[i].store_id);
            // console.log('i am here'+store_option.options[store_option.selectedIndex].value)

        }

        products_options.innerHTML ='';

        // Loop through optionsData and create option elements
        array.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.text = option.name;
        optionElement.value = option.id;
        products_options.appendChild(optionElement);
        });
    })
}
