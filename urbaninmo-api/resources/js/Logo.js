class Logo extends HTMLElement {
    constructor() {
        super();
        const shadow = this.attachShadow({ mode: 'open' });

        const logoContainer = document.createElement('div');
        logoContainer.setAttribute('class', 'logo-container');

        const logoLink = document.createElement('a');
        logoLink.setAttribute('href', '/');
        logoLink.setAttribute('class', 'logo');

        const logoText = document.createElement('h1');
        logoText.setAttribute('class', 'logo-text');

        const logoPart = document.createElement('span');
        logoPart.setAttribute('class', 'logo-part');
        logoPart.textContent = 'Urban';

        const logoHighlight = document.createElement('span');
        logoHighlight.setAttribute('class', 'logo-highlight');
        logoHighlight.textContent = 'Inmo';

        logoText.appendChild(logoPart);
        logoText.appendChild(logoHighlight);
        logoLink.appendChild(logoText);
        logoContainer.appendChild(logoLink);
        shadow.appendChild(logoContainer);

        const style = document.createElement('style');
        style.textContent = `
            .logo-container {

            }
            .logo {
                text-decoration: none;
            }
            .logo-text {
                font-size: 24px;
                display: inline-block;
            }
            .logo-part {
                padding: 2.5px;
            }
            .logo-highlight {
                background-color: #3563E9;
                color: white;
                padding: .25rem;
                border-radius: 8px;
            }
        `;
        shadow.appendChild(style);
    }
}

customElements.define('logo-component', Logo);
