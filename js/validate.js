/**
 * 
 * @param {HTMLButtonElement} btn
 * @description ser till att knappen är avstängd (dvs att den är grå och inte går att klicka på) 
 */
const ensureDisabled = (btn) => {
    if(!btn.classList.contains("disabled")) btn.classList.add("disabled")
    if(!btn.attributes.getNamedItem("disabled")) btn.setAttribute("disabled", "true")
}

/**
 * 
 * @param {HTMLButtonElement} btn
 * @description ser till att knappen INTE är avstängd (dvs att den är grå och inte går att klicka på) 
 */
const ensureAbledIdk = (btn) => {
    btn.classList.remove("disabled")
    btn.removeAttribute("disabled")
}

const validateRegister = () => {
    const username = document.querySelector("input[name='username']")
    const email = document.querySelector("input[name='email']")
    const password = document.querySelector("input[name='password']")
    const btn = document.querySelector("input[type='submit']")

    if(username.value.length < 5 || password.value.length < 5) return ensureDisabled(btn)
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) return ensureDisabled(btn)

    ensureAbledIdk(btn)
}

const validateLogin = () => {
    const email = document.querySelector("input[name='email']")
    const password = document.querySelector("input[name='password']")
    const btn = document.querySelector("input[type='submit']")

    if(password.value.length < 5) return ensureDisabled(btn)
    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) return ensureDisabled(btn)

    ensureAbledIdk(btn)
}