let product_price=document.getElementById('product_price')
let decr_price=document.getElementById('decr_price')
let incr_price=document.getElementById('incr_price')

decr_price.addEventListener('click',function(){
    console.log('hello')
    product_price.value=product_price.value-1
})
incr_price.addEventListener('click',function(){
    console.log('hello')
    product_price.value=parseInt(product_price.value)+1
})

let product_quantity=document.getElementById('product_quantity')
let decr_quantity=document.getElementById('decr_quantity')
let incr_quantity=document.getElementById('incr_quantity')

decr_quantity.addEventListener('click',function(){
    product_quantity.value=product_quantity.value-1
})
incr_quantity.addEventListener('click',function(){
    product_quantity.value=parseInt(product_quantity.value)+1
})
