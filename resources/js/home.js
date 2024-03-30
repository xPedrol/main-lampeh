const init_interval = () => {
    return setInterval(() => {
        i++
        i_cycle()
        img_carousel.src = `/carousel/m/c${i}.jpeg`
    }, 5000)
}
const i_cycle = ()=>{
    if (i > 7) i = 1
    if (i < 1) i = 7
}

let i = 0;
img_carousel = document.getElementById('img-carousel')
let img_interval = init_interval()
const change_image = (prev) => {
    clearInterval(img_interval)
    img_interval = null
    if(i === 0) i = 1
    if (prev) {
        i--
    }else {
        i++
    }
    i_cycle()
    img_carousel.src = `/carousel/m/c${i}.jpeg`
    img_interval = init_interval()
}

window.change_image = change_image
