
const children_hover = (id) => {
    const children = document.getElementById(id)
    if (!children) return
    if (children.style.display === 'block') {
        children.style.display = 'none'
        return
    }
    children.style.display = 'block'
}

const toggle_mobile_nav = () => {
    const mobile_nav = document.getElementById('mobile-nav')
    // if (!mobile_nav.style.height || mobile_nav.style.height === '0px') {
    //     mobile_nav.style.height = '100%'
    //     return
    // }
    // mobile_nav.style.height = '0'
    mobile_nav.style.backgroundColor = 'blue'
}
