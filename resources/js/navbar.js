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
    if (!mobile_nav.style.maxHeight || mobile_nav.style.maxHeight === '0px') {
        mobile_nav.style.maxHeight = '1000px'
        return
    }
    mobile_nav.style.maxHeight = '0px'
    // mobile_nav.style.backgroundColor = 'blue'
}
window.children_hover = children_hover;
window.toggle_mobile_nav = toggle_mobile_nav;
