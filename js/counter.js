const numbers = document.querySelectorAll(".number")

numbers.forEach( num => {
    num.innerHTML = "0"
    function counting(){
        const finalNum = +num.getAttribute("data-num")
        let value = +num.innerHTML
        let step = finalNum / 100

        if(value < finalNum){
            num.innerHTML = Math.ceil(value + step)
            setTimeout( counting, 100)
        }
    }
    counting()
})