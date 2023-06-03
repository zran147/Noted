const select = (el,all=false)=>{
    el = el.trim()
    if (all) {
        return [...document.querySelectorAll(el)]
    } else {
        return document.querySelector(el)
    }
}
const on = (type,el,listener,all=false)=>{
    let selectEl = select(el, all)
    if (selectEl) {
        if (all) {
            selectEl.forEach(e=>e.addEventListener(type, listener))
        } else {
            selectEl.addEventListener(type, listener)
        }
    }
}
on('click', '.hamburger', function(e) {
    select('.hamburger').classList.toggle('active')
    this.classList.toggle('fa-bars')
    this.classList.toggle('fa-xmark')
})