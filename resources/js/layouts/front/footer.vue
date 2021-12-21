<template>
    <footer class="footer">
        <div class="footer__wrap center">
            <div class="footer__left">
                <div class="logo-bottom">
                    <img class="lazy" width="100" height="67" src="/images/Logo.png" alt="" />
                </div>
            </div>
            <div class="footer__right">
                <div class="menu-bottom">
                    <div class="menu-bottom__title footer__title mb14">MAIN</div>
                    <ul>
                        <li>
                            <router-link to="/about">About us</router-link>
                        </li>
                        <li>
                            <router-link to="/catalog"> Catalog </router-link>
                        </li>
                        <li>
                            <router-link to="/manufacturing">Manufacturing</router-link>
                        </li>
                        <li>
                            <router-link to="/distribution"> Distribution </router-link>
                        </li>
                        <li>
                            <router-link to="/contact"> Contact us </router-link>
                        </li>
                        <li>
                            <router-link to="/careers"> Careers </router-link>
                        </li>
                    </ul>
                </div>
                <div class="information">
                    <div class="information__title footer__title mb14">INFORMATION</div>
                    <div class="information__items">
                        <div class="information__item or14">
                            2800 Dalton Avenue, Suite 1 Quebec City, Quebec CA G1P 3S4
                        </div>
                        <a href="tel:4186512800" class="information__item or14">T: 418-651-2800</a>
                        <a href="tel:18666512800" class="information__item or14"
                            >SF: 1-866-651-2800</a
                        >
                        <a href="tel:4186516755" class="information__item or14">F: 418-651-67-55</a>
                        <a href="mailto:info@megatex.ca" class="information__item or14"
                            >C: info@megatex.ca</a
                        >
                    </div>
                </div>
                <div class="hour-social">
                    <div class="hour-social__title footer__title mb14">HOURS</div>
                    <div class="hour-social__text or14">Mon-Fri, 08:00-17:00</div>

                    <div class="hour-social__title footer__title mb14">SOCIAL</div>
                    <div class="hour-social__items">
                        <a href="mail" class="hour-social__item">
                            <span class="hour-social__item-hover1 hover1 before">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle cx="13" cy="13" r="13" fill="#EE2738" />
                                    <path
                                        d="M20 7H5.99995C5.50095 7 5.10495 7.40581 5.02995 7.92835L13 13.6566L20.97 7.92835C20.895 7.40581 20.499 7 20 7Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M5 16.8096V9.21267L10.394 13.0897L5 16.8096Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M21 16.8096L15.606 13.0897L21 9.21267V16.8096Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M13.275 14.7652L14.69 13.7485L20.968 18.0793C20.891 18.5975 20.497 19 20 19H5.99998C5.50298 19 5.10898 18.5975 5.03198 18.0793L11.31 13.7474L12.725 14.7652C12.809 14.8252 12.904 14.8546 13 14.8546C13.096 14.8546 13.191 14.8252 13.275 14.7652Z"
                                        fill="white"
                                    />
                                </svg>
                            </span>
                            <span class="hour-social__item-hover2 hover2 after">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <circle cx="13" cy="13" r="13" fill="white" />
                                    <path
                                        d="M20 7H5.99995C5.50095 7 5.10495 7.40581 5.02995 7.92835L13 13.6566L20.97 7.92835C20.895 7.40581 20.499 7 20 7Z"
                                        fill="#1C1C1C"
                                    />
                                    <path
                                        d="M5 16.8096V9.21267L10.394 13.0897L5 16.8096Z"
                                        fill="#1C1C1C"
                                    />
                                    <path
                                        d="M21 16.8096L15.606 13.0897L21 9.21267V16.8096Z"
                                        fill="#1C1C1C"
                                    />
                                    <path
                                        d="M13.275 14.7652L14.69 13.7485L20.968 18.0793C20.891 18.5975 20.497 19 20 19H5.99998C5.50298 19 5.10898 18.5975 5.03198 18.0793L11.31 13.7474L12.725 14.7652C12.809 14.8252 12.904 14.8546 13 14.8546C13.096 14.8546 13.191 14.8252 13.275 14.7652Z"
                                        fill="#1C1C1C"
                                    />
                                </svg>
                            </span>
                        </a>
                        <a href="twitter" class="hour-social__item">
                            <span class="hour-social__item-hover1 hover1 before">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13.0009 25.9998C20.1805 25.9998 26.0007 20.1795 26.0007 12.9999C26.0007 5.82025 20.1805 0 13.0009 0C5.82122 0 0.000976562 5.82025 0.000976562 12.9999C0.000976562 20.1795 5.82122 25.9998 13.0009 25.9998Z"
                                        fill="#55ACEE"
                                    />
                                    <path
                                        d="M20.963 9.34253C20.4059 9.58956 19.8067 9.75664 19.1782 9.83126C19.8199 9.44681 20.3123 8.8385 20.5447 8.11248C19.9443 8.46865 19.279 8.72704 18.5715 8.86631C18.0047 8.26264 17.1971 7.88538 16.3028 7.88538C14.587 7.88538 13.1955 9.27695 13.1955 10.9927C13.1955 11.2363 13.2231 11.4733 13.2764 11.7009C10.6939 11.5714 8.40412 10.3344 6.87142 8.45382C6.604 8.91266 6.45059 9.44681 6.45059 10.0162C6.45059 11.094 6.99957 12.0455 7.83289 12.6026C7.32377 12.5866 6.84431 12.4469 6.42557 12.2135C6.42533 12.2267 6.42533 12.2399 6.42533 12.2529C6.42533 13.7585 7.49688 15.0142 8.91811 15.2995C8.65764 15.3709 8.38257 15.4087 8.09962 15.4087C7.89894 15.4087 7.70451 15.3894 7.51495 15.3533C7.91029 16.5875 9.05761 17.4859 10.4177 17.5112C9.354 18.3447 8.01434 18.8414 6.55812 18.8414C6.30784 18.8414 6.05989 18.8268 5.81726 18.7978C7.19168 19.6798 8.82542 20.194 10.5801 20.194C16.2956 20.194 19.4213 15.4592 19.4213 11.3526C19.4213 11.218 19.4183 11.0838 19.4122 10.9508C20.0198 10.5128 20.5466 9.96566 20.963 9.34253Z"
                                        fill="white"
                                    />
                                </svg>
                            </span>
                            <span class="hour-social__item-hover2 hover2 after">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13.0009 25.9998C20.1805 25.9998 26.0007 20.1795 26.0007 12.9999C26.0007 5.82025 20.1805 0 13.0009 0C5.82122 0 0.000976562 5.82025 0.000976562 12.9999C0.000976562 20.1795 5.82122 25.9998 13.0009 25.9998Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M20.963 9.34253C20.4059 9.58956 19.8067 9.75664 19.1782 9.83126C19.8199 9.44681 20.3123 8.8385 20.5447 8.11248C19.9443 8.46865 19.279 8.72704 18.5715 8.86631C18.0047 8.26264 17.1971 7.88538 16.3028 7.88538C14.587 7.88538 13.1955 9.27695 13.1955 10.9927C13.1955 11.2363 13.2231 11.4733 13.2764 11.7009C10.6939 11.5714 8.40412 10.3344 6.87142 8.45382C6.604 8.91266 6.45059 9.44681 6.45059 10.0162C6.45059 11.094 6.99957 12.0455 7.83289 12.6026C7.32377 12.5866 6.84431 12.4469 6.42557 12.2135C6.42533 12.2267 6.42533 12.2399 6.42533 12.2529C6.42533 13.7585 7.49688 15.0142 8.91811 15.2995C8.65764 15.3709 8.38257 15.4087 8.09962 15.4087C7.89894 15.4087 7.70451 15.3894 7.51495 15.3533C7.91029 16.5875 9.05761 17.4859 10.4177 17.5112C9.354 18.3447 8.01434 18.8414 6.55812 18.8414C6.30784 18.8414 6.05989 18.8268 5.81726 18.7978C7.19168 19.6798 8.82542 20.194 10.5801 20.194C16.2956 20.194 19.4213 15.4592 19.4213 11.3526C19.4213 11.218 19.4183 11.0838 19.4122 10.9508C20.0198 10.5128 20.5466 9.96566 20.963 9.34253Z"
                                        fill="#1C1C1C"
                                    />
                                </svg>
                            </span>
                        </a>
                        <a href="facebook" class="hour-social__item">
                            <span class="hour-social__item-hover1 hover1 before">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13 26C20.1797 26 26 20.1797 26 13C26 5.8203 20.1797 0 13 0C5.8203 0 0 5.8203 0 13C0 20.1797 5.8203 26 13 26Z"
                                        fill="#3B5998"
                                    />
                                    <path
                                        d="M16.2682 13.5089H13.9485V22.0072H10.434V13.5089H8.76245V10.5223H10.434V8.58961C10.434 7.20753 11.0905 5.04333 13.9798 5.04333L16.5831 5.05423V7.95326H14.6942C14.3844 7.95326 13.9487 8.10806 13.9487 8.76735V10.5251H16.5752L16.2682 13.5089Z"
                                        fill="white"
                                    />
                                </svg>
                            </span>
                            <span class="hour-social__item-hover2 hover2 after">
                                <svg
                                    width="26"
                                    height="26"
                                    viewBox="0 0 26 26"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M13 26C20.1797 26 26 20.1797 26 13C26 5.8203 20.1797 0 13 0C5.8203 0 0 5.8203 0 13C0 20.1797 5.8203 26 13 26Z"
                                        fill="white"
                                    />
                                    <path
                                        d="M16.2682 13.5089H13.9485V22.0072H10.434V13.5089H8.76245V10.5223H10.434V8.58961C10.434 7.20753 11.0905 5.04333 13.9798 5.04333L16.5831 5.05423V7.95326H14.6942C14.3844 7.95326 13.9487 8.10806 13.9487 8.76735V10.5251H16.5752L16.2682 13.5089Z"
                                        fill="#1C1C1C"
                                    />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy center">© Mégatex Inc. 2021 - <a href="#">Legal</a></div>
    </footer>
</template>

<script>
export default {
    name: "FooterComponent",
};
</script>

<style scoped></style>
<style src="../../../css/user.css"></style>
