const extend = (id) => {
    if(!document.getElementById(id)) return
    for (let i = 0; i < document.getElementById(id).children.length; i++) {
        const child = document.getElementById(id).children.item(i)
        if (child.children.length > 0) {
            const p = child.children.item(0);
            p.style.display = 'block'
        }
    }

}
const reduce = (id) => {
    if(!document.getElementById(id)) return
    for (let i = 0; i < document.getElementById(id).children.length; i++) {
        const child = document.getElementById(id).children.item(i)
        if (child.children.length > 0) {
            const p = child.children.item(0);
            p.style.display = '-webkit-box'
        }
    }
}
window.extend = extend
window.reduce = reduce
