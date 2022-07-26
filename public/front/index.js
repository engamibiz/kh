class SiteHeader extends HTMLElement {
  connectedCallback() {

    this.innerHTML = `
    <header id="main-header" class="main-header">
      <div class="container-fluid">

        <nav class="navbar p-0 inner-menu navbar-top">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">about us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">contact us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#">news</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="blogs.html">blogs one</a>
                <a class="dropdown-item" href="blogs.html">blogs two</a>
                <a class="dropdown-item" href="blogs.html">blogs three</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="careers.html">careers</a>
            </li>
          </ul>

          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link social-link facebook" href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link twitter" href="#">
                <i class="fa-brands fa-twitter"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link instagram" href="#">
                <i class="fab fa-instagram"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link linkedin" href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link youtube" href="#">
                <i class="fab fa-youtube"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link snapchat" href="#">
                <svg viewBox="0 0 24 24" width="20">
                  <path fill="#fffc00" d="M0 0h24v24H0z"/>
                  <path fill="#fff" stroke="#004274" d="M11.871 21.764c-1.19 0-1.984-.561-2.693-1.056-.503-.357-.976-.696-1.533-.79a4.568 4.568 0 0 0-.803-.066c-.472 0-.847.071-1.114.125-.17.03-.312.058-.424.058-.116 0-.263-.032-.32-.228-.05-.16-.081-.312-.112-.459-.08-.37-.147-.597-.286-.62-1.489-.227-2.38-.57-2.554-.976-.014-.044-.031-.09-.031-.125-.01-.125.08-.227.205-.25 1.181-.196 2.242-.824 3.138-1.858.696-.803 1.035-1.579 1.066-1.663 0-.01.009-.01.009-.01.17-.351.205-.65.102-.895-.191-.46-.825-.656-1.257-.79-.111-.03-.205-.066-.285-.093-.37-.147-.986-.46-.905-.892.058-.312.472-.535.811-.535.094 0 .174.014.24.05.38.173.723.262 1.017.262.366 0 .54-.138.584-.182a24.93 24.93 0 0 0-.035-.593c-.09-1.365-.192-3.059.24-4.03 1.298-2.907 4.053-3.14 4.869-3.14L12.156 3h.05c.815 0 3.57.227 4.868 3.139.437.971.33 2.67.24 4.03l-.008.067c-.01.182-.023.356-.032.535.045.035.205.169.535.173.286-.008.598-.102.954-.263a.804.804 0 0 1 .312-.066c.125 0 .25.03.357.066h.009c.299.112.495.321.495.54.009.205-.152.517-.914.825-.08.03-.174.067-.285.093-.424.13-1.057.335-1.258.79-.111.24-.066.548.103.895 0 .01.009.01.009.01.049.124 1.337 3.049 4.204 3.526a.246.246 0 0 1 .205.25c0 .044-.009.089-.031.129-.174.41-1.057.744-2.555.976-.138.022-.205.25-.285.62a6.831 6.831 0 0 1-.112.459c-.044.147-.138.227-.298.227h-.023c-.102 0-.24-.013-.423-.049a5.285 5.285 0 0 0-1.115-.116c-.263 0-.535.023-.802.067-.553.09-1.03.433-1.534.79-.717.49-1.515 1.051-2.697 1.051h-.254z"/></svg>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link social-link telegram" href="#">
                <i class="fa-brands fa-telegram"></i>
              </a>
            </li>

          </ul>
        </nav>

        <nav class="navbar px-0 navbar-expand-lg">
          <a class="navbar-brand" href="index.html">
            <img src="images/full-logo.png" alt="KH Logo">
          </a>

          <div class="inner-menu middle-menu flex-grow-1">
            <ul class="nav">

              <li class="nav-item nav-item--middle ml-auto">
                <strong>
                  <img width="20" src="images/time.png" /> Mon - Sat:
                </strong>
                08.00am - 18.00pm
              </li>

              <li class="nav-item nav-item--middle">
                <a href="tel:+00 (123) 456 7890">
                  <strong>
                    <img width="20" src="images/phone.png" /> Call Us:
                  </strong>
                  +00 (123) 456 7890
                </a>
              </li>

              <li class="nav-item nav-item--middle">
                <a href="mailto:support@domain.com">
                  <strong>
                    <img width="20" src="images/letter.png" /> Send Email:
                  </strong>
                  support@domain.com
                </a>
              </li>

            </ul>
          </div>

          <a class="nav-link lang-item ml-auto" href="#">
            <img src="images/egypt-flag.png" width="20"/>
            <span>عربي</span>
          </a>

          <button class="navbar-toggler" data-toggle="collapse" data-target="#toggle-menu" aria-expanded="false">
            <div class="line line1"></div>
            <div class="line line2"></div>
            <div class="line line3"></div>
          </button>

        </nav>

        <nav class="inner-menu main-menu">
          <ul class="nav">
            <li class="nav-item active">
              <a href="index.html" class="nav-link"><i class="fas fa-home"></i></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="projects.html">projects</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#">units</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="units.html">primary</a>
                <a class="dropdown-item" href="units.html">resale</a>
                <a class="dropdown-item" href="units.html">rent</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="developers.html">developers</a>
            </li>

          </ul>
        </nav>

        <div class="collapse navbar-collapse" id="toggle-menu">
          <ul class="navbar-nav navbar-nav-scroll">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.html">about us</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="projects.html">projects</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#">units</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="units.html">primary</a>
                <a class="dropdown-item" href="units.html">resale</a>
                <a class="dropdown-item" href="units.html">rent</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="developers.html">developers</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#">blogs</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="blogs.html">blogs one</a>
                <a class="dropdown-item" href="blogs.html">blogs two</a>
                <a class="dropdown-item" href="blogs.html">blogs three</a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">contact us</a>
            </li>

            <li class="nav-item phone-item">
              <a class="nav-link" href="tel:+00 (123) 456 7890">
                <span>+00 (123) 456 7890</span>
              </a>
            </li>
            
          </ul>
        </div>

      </div>
    </header>
    `;
  }
};

class SiteFooter extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <footer class="main-footer padding-block">
      <div class="container-fluid">

        <div class="logo-text mb-5">
          <img class="footer-logo" src="images/full-logo.png">
        </div>

        <div class="row">
          <div class="col-md-3 mb-3">
            <h3 class="footer-title">Areas</h3>
            <ul class="footer-widget">
              <li><a href="#">Apartments for sale in New Cairo </a></li>
              <li><a href="#">Apartments for sale in North Coast </a></li>
              <li><a href="#">Apartments for sale in Ain Sokhna </a></li>
              <li><a href="#">Apartments for sale in 6th October </a></li>
              <li><a href="#">Apartments for sale in El Gouna </a></li>
              <li><a href="#">Apartments for sale in Somabay </a></li>
              <li><a href="#">Apartments for sale in 6th October </a></li>
              <li><a href="#">Apartments for sale in El Gouna </a></li>
              <li><a href="#">Apartments for sale in Somabay </a></li>
              <li><a class="more-link" href="#">More</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h3 class="footer-title">Latest Compounds</h3>
            <ul class="footer-widget">
              <li><a href="#">Taj City apartments for sale</a></li>
              <li><a href="#">New Giza apartments for sale</a></li>
              <li><a href="#">Sarai apartments for sale</a></li>
              <li><a href="#">Palm Parks apartments for sale</a></li>
              <li><a href="#">Stella Di Mary Ein Sokhna apartments for sale</a></li>
              <li><a href="#">Sarai apartments for sale</a></li>
              <li><a href="#">Stella Di Mary Ein Sokhna apartments for sale</a></li>
              <li><a href="#">Sarai apartments for sale</a></li>
              <li><a href="#">Palm Parks apartments for sale</a></li>
              <li><a href="#">Stella Di Mary Ein Sokhna apartments for sale</a></li>
              <li><a class="more-link" href="#">More</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h3 class="footer-title">Latest Developers</h3>
            <ul class="footer-widget">
              <li><a href="#">Apartments for sale by Roya Developments</a></li>
              <li><a href="#">Apartments for sale by Alexandria</a></li>
              <li><a href="#">Apartments for sale by </a></li>
              <li><a href="#">Apartments for sale by West Gulf Company</a></li>
              <li><a href="#">Apartments for sale by Alexandria</a></li>
              <li><a href="#">Apartments for sale by </a></li>
              <li><a href="#">Apartments for sale by West Gulf Company</a></li>
              <li><a href="#">Apartments for sale by </a></li>
              <li><a href="#">Apartments for sale by West Gulf Company</a></li>
              <li><a class="more-link" href="#">More</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-3">
            <h3 class="footer-title">Hot properties</h3>
            <ul class="footer-widget">
              <li><a href="#">Sarai Croons - Studio for sale</a></li>
              <li><a href="#">La Vista Bay - Chalet Typical for sale</a></li>
              <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
              <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
              <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
              <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
              <li><a href="#">La Vista Bay - Chalet Typical for sale</a></li>
              <li><a href="#">La Vista Ras El Hikma - Twinhouse - Not sea view for sale</a></li>
              <li><a href="#">Shalya Taj City - Apartment Garden for sale</a></li>
              <li><a href="#">Hacienda Bay - Water Villa for sale</a></li>
              <li><a class="more-link" href="#">More</a></li>
            </ul>
          </div>
        </div>

        <nav class="contacts__social">

          <a class="contacts__social--link facebook" href="#">
            <i class="fab fa-facebook-f"></i>
          </a>

          <a class="contacts__social--link twitter" href="#">
            <i class="fa-brands fa-twitter"></i>
          </a>

          <a class="contacts__social--link instagram" href="#">
            <i class="fab fa-instagram"></i>
          </a>

          <a class="contacts__social--link linkedin" href="#">
            <i class="fab fa-linkedin-in"></i>
          </a>

          <a class="contacts__social--link youtube" href="#">
            <i class="fab fa-youtube"></i>
          </a>

          <a class="contacts__social--link snapchat" href="#">
            <svg viewBox="0 0 24 24" width="20">
              <path fill="#fffc00" d="M0 0h24v24H0z"/>
              <path fill="#fff" stroke="#004274" d="M11.871 21.764c-1.19 0-1.984-.561-2.693-1.056-.503-.357-.976-.696-1.533-.79a4.568 4.568 0 0 0-.803-.066c-.472 0-.847.071-1.114.125-.17.03-.312.058-.424.058-.116 0-.263-.032-.32-.228-.05-.16-.081-.312-.112-.459-.08-.37-.147-.597-.286-.62-1.489-.227-2.38-.57-2.554-.976-.014-.044-.031-.09-.031-.125-.01-.125.08-.227.205-.25 1.181-.196 2.242-.824 3.138-1.858.696-.803 1.035-1.579 1.066-1.663 0-.01.009-.01.009-.01.17-.351.205-.65.102-.895-.191-.46-.825-.656-1.257-.79-.111-.03-.205-.066-.285-.093-.37-.147-.986-.46-.905-.892.058-.312.472-.535.811-.535.094 0 .174.014.24.05.38.173.723.262 1.017.262.366 0 .54-.138.584-.182a24.93 24.93 0 0 0-.035-.593c-.09-1.365-.192-3.059.24-4.03 1.298-2.907 4.053-3.14 4.869-3.14L12.156 3h.05c.815 0 3.57.227 4.868 3.139.437.971.33 2.67.24 4.03l-.008.067c-.01.182-.023.356-.032.535.045.035.205.169.535.173.286-.008.598-.102.954-.263a.804.804 0 0 1 .312-.066c.125 0 .25.03.357.066h.009c.299.112.495.321.495.54.009.205-.152.517-.914.825-.08.03-.174.067-.285.093-.424.13-1.057.335-1.258.79-.111.24-.066.548.103.895 0 .01.009.01.009.01.049.124 1.337 3.049 4.204 3.526a.246.246 0 0 1 .205.25c0 .044-.009.089-.031.129-.174.41-1.057.744-2.555.976-.138.022-.205.25-.285.62a6.831 6.831 0 0 1-.112.459c-.044.147-.138.227-.298.227h-.023c-.102 0-.24-.013-.423-.049a5.285 5.285 0 0 0-1.115-.116c-.263 0-.535.023-.802.067-.553.09-1.03.433-1.534.79-.717.49-1.515 1.051-2.697 1.051h-.254z"/></svg>
          </a>

          <a class="contacts__social--link telegram" href="#">
            <i class="fa-brands fa-telegram"></i>
          </a>

        </nav>

        <div class="copyrights text-center mt-5">
          <p>
            &copy; 2022 all rights reserved.
            made with
            <i class="fa fa-heart"></i>
            by
            <a href="https://www.8worx.com/"><strong>8WORX</strong></a>
          </p>
        </div>
      </div>
    </footer>
    `;
  }
};

class Cookies extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="cookie-banner">
      <div class="container">
        <p>
          We use cookies to offer you a better browsing experience and analyze site traffic. If you continue
          to use this site, you consent to our use of cookies
          <a href="privacy.html">Learn more</a>
        </p>
        <button class="cookie-btn">Got it!</button>
      </div>
    </div>`;
  }
};

class GoTop extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <button class="go-top-btn">
        <svg width="25" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
        </svg>
      </button>
    `;
  }
};

class SearchBox extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div class="search-box">
        <form class="search-form">

          <div class="search-fields-holder">
            <div class="search-fields">

              <div class="form-group mb-0">
                <label class="select-label">Location</label>
                <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                  <option>All Locations</option>
                  <option>Sokhna</option>
                  <option>North</option>
                  <option>Ras Sudr</option>
                </select>
              </div>

              <div class="form-group mb-0">
                <label class="select-label">Property Type</label>
                <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                  <option>All types</option>
                  <option>Commercial</option>
                  <option>Residential</option>
                  <option>Apartment</option>
                  <option>Villa</option>
                  <option>Condominium</option>
                </select>
              </div>

              <div class="form-group mb-0">
                <label class="select-label">Area <small>(sq ft)</small></label>
                <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                  <option data-content="80 <small>m<sup>2</sup></small>">80 <small>m<sup>2</sup></small>
                  </option>
                  <option data-content="100 <small>m<sup>2</sup></small>">100 <small>m<sup>2</sup></small>
                  </option>
                </select>
              </div>
            </div>

            <div class="collapse" id="advanceSearch">
              <div class="search-fields">
                <div class="form-group mb-0">
                  <label class="select-label">Min Price</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>Any</option>
                    <option>1,000,000 EGP</option>
                    <option>1,700,000 EGP</option>
                  </select>
                </div>

                <div class="form-group mb-0">
                  <label class="select-label">Max Price</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>Any</option>
                    <option>1,700,000 EGP</option>
                    <option>2,700,000 EGP</option>
                  </select>
                </div>

                <div class="form-group mb-0">
                  <label class="select-label">Bedrooms</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>Studio</option>
                    <option>1 Bedroom</option>
                    <option>2 Bedrooms</option>
                    <option>4 Bedrooms</option>
                    <option>5 Bedrooms</option>
                    <option>6 Bedrooms</option>
                    <option>7 Bedrooms</option>
                  </select>
                </div>

                <div class="form-group mb-0">
                  <label class="select-label">Bathrooms</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>1 Bathroom</option>
                    <option>2 Bathrooms</option>
                    <option>4 Bathrooms</option>
                  </select>
                </div>

                <div class="form-group mb-0">
                  <label class="select-label">Offering Type</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>Cash</option>
                    <option>Installments</option>
                  </select>
                </div>

                <div class="form-group mb-0">
                  <label class="select-label">Finishing Type</label>
                  <select class="selectpicker" data-dropdown-align-right="true" data-width="100%">
                    <option>Unfinished</option>
                    <option>Core & Shell</option>
                    <option>Fully Finished High End</option>
                    <option>Fully Finished</option>
                    <option>Super Lux</option>
                    <option>Ultra Super Lux</option>
                    <option>Semi Finished</option>
                  </select>
                </div>
              </div>

              <div class="collapse" id="moreOptions">
                <div class="search-fields more-options-holder p-3">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-1">
                    <label class="custom-control-label" for="feat-1">Bike Path</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-2">
                    <label class="custom-control-label" for="feat-2">Central Cooling</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-3">
                    <label class="custom-control-label" for="feat-3">Central Heating</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-4">
                    <label class="custom-control-label" for="feat-4">Dual Sinks</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-5">
                    <label class="custom-control-label" for="feat-5">Electric Range</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-6">
                    <label class="custom-control-label" for="feat-6">Emergency Exit</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-7">
                    <label class="custom-control-label" for="feat-7">Fire Alarm</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-8">
                    <label class="custom-control-label" for="feat-8">Fire Place</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-9">
                    <label class="custom-control-label" for="feat-9">Home Theater</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-10">
                    <label class="custom-control-label" for="feat-10">Hurricane Shutters</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-11">
                    <label class="custom-control-label" for="feat-11">Jog Path</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-12">
                    <label class="custom-control-label" for="feat-12">Laundry Room</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-13">
                    <label class="custom-control-label" for="feat-13">Lawn</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-14">
                    <label class="custom-control-label" for="feat-14">Marble Floors</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="feat-16">
                    <label class="custom-control-label" for="feat-16">Swimming Pool</label>
                  </div>
                </div>
              </div>

              <button type="button" data-toggle="collapse" data-target="#moreOptions" aria-expanded="false"
                class="form-btn more-options-btn">
              </button>

            </div>
          </div>

          <div class="search-btns-holder">
            <button type="button" class="form-btn advance-search-btn" data-toggle="collapse"
              data-target="#advanceSearch" aria-expanded="false">
              <span class="text d-md-none">Advance Search</span>
              <span class="advance-search-arrow">
                <span>Advance Search</span>
                <svg width="37" viewBox="0 0 37 32">
                  <g fill="none">
                    <g stroke="currentColor">
                      <path d="M31 1C31 21 20.8 31 0.5 31"></path>
                      <path d="M25 8C25 8 26.9 5.7 30.8 1L36 8"></path>
                    </g>
                  </g>
                </svg>
              </span>
            </button>

            <button type="submit" class="form-btn submit-btn">Search</button>

          </div>

        </form>
      </div>
    `;
  }
};

class ContactForm extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `

    <div class="contact__holder hide">
      <button class="show-contact-us" title="CONTACT US">
        <i class="fas fa-envelope"></i>
      </button>
      
      <div class="form-holder">
        <button class="close-contact-us">
          <svg width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
        <h3 class="form-title">Contact us</h3>
        <p class="form-desc">Use the form below to contact us!</p>
        
        <form>

          <div class="form-group">
            <input type="text" class="form-control" placeholder="Name">
          </div>

          <div class="form-group">
            <input type="text" class="form-control phone-input" inputmode="tel" placeholder="Mobile Number">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" inputmode="email" placeholder="Email">
          </div>

          <div class="form-group">
            <textarea rows='4' class="form-control" placeholder="Message"></textarea>
          </div>

          <div class="form-group mb-0">
            <button type="submit" class="site-btn">SEND</button>
          </div>
          
        </form>
      </div>

    </div>
    `;
  }
};

class FloatedContacts extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="icons-holder">
      <nav>
        <ul>
          <li>
            <a href="#" target="_blank" title="Messenger">
              <img src="images/msn-icon.png">
            </a>
          </li>

          <li>
            <a href="#" target="_blank" title="Whatsapp">
              <img src="images/whats-icon.png">
            </a>
          </li>

          <li>
            <a href="tel:+00 (123) 456 7890" title="Phone">
              <img src="images/tel-icon.png">
            </a>
          </li>
        </ul>
      </nav>
    </div>
    `;
  }
};

class ProjectCard extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="project-card" itemscope itemtype="https://schema.org/Product">

      <a href="project.html" class="proj-img" itemprop="url">
        <meta itemprop="image" content="" />
        <img src="" alt="Project Image" itemprop="image">
      </a>

      <div class="proj-logo">
        <img src="" alt="project logo"/>
      </div>

      <div class="proj-info">
        <h4 class="proj-title"><a href="project.html" itemprop="url"></a></h4>

        <p class="proj-price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
          Starting Price: <strong itemprop="price" content=""></strong> <small>EGP</small>
        </p>

      </div>

    </div>
    `;
    const projectImg = this.querySelector('.proj-img img');
    const projectLogo = this.querySelector('.proj-logo img');
    const projectTitle = this.querySelector('.proj-title a');
    const projectPrice = this.querySelector('.proj-price strong');

    projectImg.src = this.getAttribute('data-img');
    projectLogo.src = this.getAttribute('data-logo');
    projectTitle.textContent = this.getAttribute('data-title');
    projectPrice.textContent = this.getAttribute('data-price');
    projectPrice.setAttribute('content', this.getAttribute('data-price'));
    projectTitle.setAttribute('title', this.getAttribute('data-title'));
  }
};

class BlogCard extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div class="blog-card">
        <a href="blog.html" class="blog-image">
          <img src="" alt="" />
        </a>
        <div class="blog-details">

          <div class="blog-time">
            <time>
              <strong class="day"></strong>
              <span class="month"></span>
            </time>
          </div>

          <div>
            <h5 class="blog-title"><a href="blog.html"></a></h5>
            <p class="blog-desc">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Id voluptatem expedita consequatur incidunt soluta voluptatum deleniti dicta obcaecati, tenetur nam doloremque ipsam labore reiciendis asperiores impedit, at praesentium dolore molestiae.
            </p>
          </div>
  
        </div>
      </div>
      `;
    const blogImg = this.querySelector('.blog-image img');
    const blogTitle = this.querySelector('.blog-title a');
    const blogDay = this.querySelector('.blog-time .day');
    const blogMonth = this.querySelector('.blog-time .month');

    blogImg.src = this.getAttribute('data-img');
    blogTitle.textContent = this.getAttribute('data-title');
    blogDay.textContent = this.getAttribute('data-day');
    blogMonth.textContent = this.getAttribute('data-month');
    blogTitle.setAttribute('title', this.getAttribute('data-title'));
  }
};

class UnitCard extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    <div class="unit" itemscope itemtype="https://schema.org/Product">

      <a class="unit__img" href="unit.html" itemprop="url">
        <meta itemprop="image" content="" />
        <img src="" alt="" itemprop="image"/>
      </a>

      <div class="unit-labels">
        <span class="unit-label unit-status">Featured</span>
        <span class="unit-label unit-offer">hot offer</span>
      </div>

      <div class="unit__content">
        <h5 class="title" itemprop="name"><a href="unit.html" itemprop="url"></a></h5>

        <p class="price" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
          <strong itemprop="price" content=""></strong> <small>EGP</small>
        </p>

        <ul class="facilities" itemprop="description">
          <li>
            <svg viewBox="0 0 349 245" fill="none">
              <path d="M0 171.925V74.2893L162.591 148.804V244.365L0 171.925Z" fill="currentColor"></path> <path d="M186.412 148.804L349 74.2859V171.926L186.412 244.365V148.804Z" fill="currentColor"></path> <path d="M186.127 95.5504V0L334.178 65.9536L227.864 114.683L186.127 95.5504Z" fill="currentColor"></path> <path d="M14.8289 65.9536L162.866 0V95.5504L121.14 114.683L14.8289 65.9536Z" fill="currentColor"></path>
            </svg>
            <span class="count rooms-count" itemprop="numberOfItems"></span> Rooms
          </li>
  
          <li>
            <svg viewBox="0 0 798 569" fill="none">
              <path d="M236.65 0H560.87C567.29 0 573.12 2.61 577.33 6.83L656.2 85.7C660.75 90.24 663.02 96.2 663.02 102.17L663.03 216.94C667.14 217.92 671.04 220 674.23 223.21L712.37 261.37C717.33 265.63 720.47 271.96 720.47 279.02V329.58H754.52C760.95 329.58 766.78 332.19 770.99 336.41L790.71 356.12C795.25 360.66 797.52 366.63 797.52 372.59L797.53 446.06C797.53 458.91 787.1 469.35 774.24 469.35H717.9V545.52C717.9 558.38 707.47 568.81 694.61 568.81H624.8C611.94 568.81 601.51 558.38 601.51 545.52V469.35H196.02V545.52C196.02 558.38 185.59 568.81 172.73 568.81H102.92C90.06 568.81 79.63 558.38 79.63 545.52V469.35H23.29C10.43 469.35 0 458.91 0 446.06V372.59C0 366.16 2.61 360.34 6.82 356.12L26.54 336.41C31.08 331.87 37.04 329.6 43.01 329.58H77.04V279.02C77.06 273.06 79.33 267.1 83.87 262.55L123.31 223.11C126.34 220.08 130.18 217.89 134.49 216.89V102.17C134.49 95.74 137.1 89.91 141.31 85.7L220.19 6.83C224.73 2.28 230.69 0.01 236.65 0V0ZM52.65 376.16L46.58 382.23V422.77C281.37 422.77 516.16 422.77 750.95 422.77V382.23L744.88 376.16C514.13 376.16 283.4 376.16 52.65 376.16V376.16ZM262.99 119.54H534.51C547.37 119.54 557.8 129.97 557.8 142.83V216.29H616.45V111.81L551.22 46.58H246.3L181.07 111.81V216.29H239.7V142.83C239.7 129.97 250.14 119.54 262.99 119.54V119.54ZM511.22 166.12H286.28V216.29H511.22V166.12ZM149.44 469.35H126.21V522.23H149.44V469.35ZM671.32 469.35H648.09V522.23H671.32V469.35ZM639.74 262.87C479.08 262.87 318.44 262.87 157.78 262.87H149.42L123.62 288.66V329.58H673.89V288.57L648.22 262.87H639.74V262.87Z" fill="currentColor"></path>
            </svg>
            <span class="count beds-count" itemprop="numberOfItems"></span> Beds
          </li>
  
          <li>
            <svg viewBox="0 0 517 515" fill="none">
              <path d="M53.7957 274.151C131 273.543 208.204 272.936 285.409 272.328C320.502 272.052 355.595 271.776 390.687 271.499C408.709 271.357 436.246 267.321 453.855 271.002C483.718 277.245 500.827 291.055 460.56 297.045C394.658 306.848 320.713 297.873 254.042 298.06C220.181 298.154 186.32 298.249 152.459 298.344C132.142 298.4 111.826 298.457 91.5092 298.514C84.737 298.533 77.9649 298.552 71.1927 298.571C52.3786 304.32 40.7481 296.826 36.3013 276.088C52.8826 279.86 59.9619 254.352 43.3362 250.57C24.104 246.195 9.18371 253.464 2.87718 272.911C-7.86142 306.025 12.9416 323.181 40.7178 325.119C107.664 329.789 176.766 324.739 243.883 324.551C313.315 324.357 383.305 326.686 452.681 323.869C475.355 322.948 505.639 324.33 513.939 298.79C523.252 270.129 504.563 248.411 478.428 244.846C413.411 235.977 340.514 245.431 274.881 245.948C201.186 246.528 127.491 247.108 53.7957 247.688C36.7748 247.822 36.7351 274.285 53.7957 274.151Z" fill="currentColor"></path> <path d="M466.461 323.548C474.73 375.537 434.999 433.231 387.646 453.943C349.846 470.477 295.94 463.719 254.54 464.503C214.778 465.257 180.991 468.261 146.51 445.99C109.925 422.358 55.4102 377.073 57.7829 329.415C58.6303 312.393 32.165 312.438 31.3198 329.415C28.8418 379.189 68.1589 422.234 105.975 450.969C163.88 494.97 203.297 492.106 274.482 490.561C338.061 489.181 389.722 494.909 438.653 449.799C477.721 413.783 500.49 370.025 491.979 316.513C489.311 299.741 463.807 306.861 466.461 323.548Z" fill="currentColor"></path> <path d="M334.065 61.9826C335.204 45.8633 330.105 43.7571 345.043 34.9641C356.06 28.4795 367.53 30.2771 379.689 30.2471C414.788 30.1607 403.851 39.6988 403.886 73.8339C403.94 127.831 403.995 181.828 404.05 235.825C404.067 252.852 430.531 252.881 430.513 235.825C430.461 184.67 430.409 133.515 430.357 82.3597C430.335 60.6536 439.565 21.7027 418.084 7.15394C401.503 -4.07547 349.393 -0.082615 330.83 5.5742C302.887 14.0895 309.347 37.2869 307.602 61.9826C306.402 78.9773 332.87 78.9021 334.065 61.9826Z" fill="currentColor"></path> <path d="M352.821 107.029C330.46 107.037 304.602 110.618 282.562 107.149C285.198 109.176 287.834 111.203 290.47 113.23C287.659 109.117 303.833 98.2036 305.929 96.6067C312.01 91.9742 315.44 89.1697 322.877 88.4098C328.161 87.8699 337.461 87.4048 342.258 89.8401C353.907 95.7527 352.133 108.756 351.855 119.376C351.41 136.411 377.873 136.401 378.318 119.376C378.914 96.5592 374.266 71.7971 349.293 64.3223C339.232 61.3106 327.763 61.3313 317.357 62.0418C303.547 62.9849 295.08 71.5673 284.66 79.9306C272.257 89.8861 250.532 115.735 271.027 130.299C279.718 136.474 294.167 133.512 304.151 133.509C320.374 133.503 336.597 133.498 352.821 133.492C369.848 133.486 369.877 107.023 352.821 107.029Z" fill="currentColor"></path> <path d="M341.354 158.199C341.354 162.021 341.354 165.844 341.354 169.666C341.354 186.694 367.817 186.722 367.817 169.666C367.817 165.844 367.817 162.021 367.817 158.199C367.817 141.171 341.354 141.143 341.354 158.199Z" fill="currentColor"></path> <path d="M277.405 164.373C278.206 166.629 278.029 165.509 277.797 167.892C277.106 175.015 284.373 181.124 291.029 181.124C298.759 181.124 303.568 175.035 304.26 167.892C304.605 164.343 304.116 160.695 302.923 157.338C300.531 150.608 293.895 146.105 286.646 148.097C280.131 149.887 275.001 157.608 277.405 164.373Z" fill="currentColor"></path> <path d="M307.834 203.186C307.834 205.832 307.834 208.479 307.834 211.125C307.834 228.153 334.297 228.181 334.297 211.125C334.297 208.479 334.297 205.832 334.297 203.186C334.297 186.158 307.834 186.13 307.834 203.186Z" fill="currentColor"></path> <path d="M317.537 488.987C317.537 493.398 317.537 497.808 317.537 502.219C317.537 519.246 344 519.275 344 502.219C344 497.808 344 493.398 344 488.987C344 471.959 317.537 471.931 317.537 488.987Z" fill="currentColor"></path> <path d="M170.226 487.222C170.226 492.221 170.226 497.219 170.226 502.218C170.226 519.245 196.689 519.274 196.689 502.218C196.689 497.219 196.689 492.221 196.689 487.222C196.689 470.194 170.226 470.166 170.226 487.222Z" fill="currentColor"></path>
            </svg>
            <span class="count bath-count" itemprop="numberOfItems"></span> Baths
          </li>
  
          <li>
            <svg viewBox="0 0 400 400" fill="none">
              <path d="M357.143 0H42.8571C31.4907 0 20.5898 4.50961 12.5526 12.5368C4.51529 20.5639 0 31.4511 0 42.8032V356.694C0 368.046 4.51529 378.933 12.5526 386.96C20.5898 394.987 31.4907 399.497 42.8571 399.497H357.143C368.509 399.497 379.41 394.987 387.447 386.96C395.485 378.933 400 368.046 400 356.694V42.8032C400 31.4511 395.485 20.5639 387.447 12.5368C379.41 4.50961 368.509 0 357.143 0ZM371.429 356.694C371.429 360.478 369.923 364.107 367.244 366.782C364.565 369.458 360.932 370.961 357.143 370.961H171.429V299.623H314.286C318.075 299.623 321.708 298.119 324.387 295.444C327.066 292.768 328.571 289.139 328.571 285.355C328.571 281.571 327.066 277.942 324.387 275.266C321.708 272.59 318.075 271.087 314.286 271.087H157.143C153.354 271.087 149.72 272.59 147.041 275.266C144.362 277.942 142.857 281.571 142.857 285.355V370.961H42.8571C39.0683 370.961 35.4347 369.458 32.7556 366.782C30.0765 364.107 28.5714 360.478 28.5714 356.694V171.213H142.857V199.748C142.857 203.532 144.362 207.162 147.041 209.837C149.72 212.513 153.354 214.016 157.143 214.016C160.932 214.016 164.565 212.513 167.244 209.837C169.923 207.162 171.429 203.532 171.429 199.748V114.142C171.429 110.358 169.923 106.729 167.244 104.053C164.565 101.377 160.932 99.8742 157.143 99.8742C153.354 99.8742 149.72 101.377 147.041 104.053C144.362 106.729 142.857 110.358 142.857 114.142V142.677H28.5714V42.8032C28.5714 39.0192 30.0765 35.3901 32.7556 32.7144C35.4347 30.0387 39.0683 28.5355 42.8571 28.5355H242.857V185.481C242.857 189.265 244.362 192.894 247.041 195.57C249.72 198.245 253.354 199.748 257.143 199.748H314.286C318.075 199.748 321.708 198.245 324.387 195.57C327.066 192.894 328.571 189.265 328.571 185.481C328.571 181.697 327.066 178.068 324.387 175.392C321.708 172.716 318.075 171.213 314.286 171.213H271.429V28.5355H357.143C360.932 28.5355 364.565 30.0387 367.244 32.7144C369.923 35.3901 371.429 39.0192 371.429 42.8032V356.694Z" fill="currentColor"></path>
            </svg>
            <span class="count area-count" itemprop="numberOfItems"></span>
            <small>m<sup>2</sup></small>
          </li>
  
        </ul>
      </div>

    </div>
    `;
    const unitImg = this.querySelector('.unit__img img');
    const unitTitle = this.querySelector('.unit__content h5 a');
    const unitPrice = this.querySelector('p.price strong');
    const areaCount = this.querySelector('.area-count');
    const roomsCount = this.querySelector('.rooms-count');
    const bedsCount = this.querySelector('.beds-count');
    const bathCount = this.querySelector('.bath-count');

    unitImg.src = this.getAttribute('data-img');
    unitTitle.textContent = this.getAttribute('data-title');
    unitPrice.textContent = this.getAttribute('data-price');
    areaCount.textContent = this.getAttribute('data-area');
    roomsCount.textContent = this.getAttribute('data-rooms');
    bedsCount.textContent = this.getAttribute('data-beds');
    bathCount.textContent = this.getAttribute('data-bath');
    unitPrice.setAttribute('content', this.getAttribute('data-price'));
    unitTitle.setAttribute('title', this.getAttribute('data-title'));
  }
};

class DevCard extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
      <div class="dev-holder">
        <a href="projects.html" class="dev-img">
          <img src="images/devs/logo-6.png" alt="">
        </a>
        <h6 class="dev-name"><a href="projects.html"></a></h6>
      </div>
    `;
    const devLogo = this.querySelector('.dev-img img');
    const devName = this.querySelector(".dev-name a");

    devLogo.src = this.getAttribute('data-logo');
    devName.textContent = this.getAttribute("data-name");
  }
};

customElements.define('site-header', SiteHeader);
customElements.define('site-footer', SiteFooter);
customElements.define('cookies-holder', Cookies);
customElements.define('go-top', GoTop);
customElements.define('search-box', SearchBox);
customElements.define('contact-form', ContactForm);
customElements.define('floated-contacts', FloatedContacts);
customElements.define('unit-card', UnitCard);
customElements.define('blog-card', BlogCard);
customElements.define('project-card', ProjectCard);
customElements.define('dev-card', DevCard);

// *************************************************

// COOKIE SCRIPT
window.addEventListener('DOMContentLoaded', () => {
  const cookieContainer = document.querySelector('.cookie-banner');
  const cookieButton = cookieContainer.querySelector('.cookie-btn');
  cookieButton.addEventListener('click', () => {
    cookieContainer.classList.remove('active');
    localStorage.setItem('cookieDisplayed', 'true');
  });
  setTimeout(() => {
    if (!localStorage.getItem('cookieDisplayed')) {
      cookieContainer.classList.add('active');
    }
  }, 2000);
});

// *************************************************

// Toggle dropdown menu in main-header
$(document).ready(function () {
  $(window).on('resize', function () {
    toggleDropdownMenu();
  });

  const toggleDropdownMenu = function () {
    const toggleBtn = $('#main-header .dropdown-toggle');
    if ($(window).width() <= 991.98) {
      toggleBtn.click(function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).next(".dropdown-menu").toggle();
      });
    } else {
      toggleBtn.click(function (e) { e.preventDefault() });
    }
  };

  toggleDropdownMenu();
});

// *************************************************

// CLOSE CONTACT FORM
const contactUs = document.querySelector('.contact__holder');
const showContactUs = contactUs.querySelector('.show-contact-us');
const closeContactUs = contactUs.querySelector('.close-contact-us');

// open contact us
showContactUs.addEventListener('click', function () {
  contactUs.classList.remove('hide');
});

// close contact us
closeContactUs.addEventListener('click', function () {
  contactUs.classList.add('hide');
});

setTimeout(() => {
  contactUs.classList.remove('hide');

  if (window.innerWidth <= 767) {
    console.log('wsfs');
    setTimeout(() => {
      contactUs.classList.add('hide');
    }, 5000);
  };

}, 10000);

// *************************************************

// toggle go top btn on scroll
let scrollUp = $(".go-top-btn");
$(window).scroll(function () {
  let scrollTop = $(this).scrollTop();
  if (scrollTop > 200) {
    scrollUp.addClass("show");
    $(".navbar-top").addClass("fixed-top");
  } else {
    scrollUp.removeClass("show");
    $(".navbar-top").removeClass("fixed-top");
  }
});

//  GO TO TOP PAGE BUTTON
$(scrollUp).click(function () {
  $("html, body").animate({ scrollTop: 0 }, 1000);
});

// *************************************************

// intl tel input plugin
$(document).ready(function () {
  $(".phone-input").each(function (e) {
    $(this).intlTelInput({ initialCountry: "eg" });
  });
});

// *************************************************

// BOOTSTRAP SELECTPICKER INIT
$('select.selectpicker').selectpicker();

// *************************************************

// ANIMATE BODY ON SHOW COLLAPSE ACCORDION
$('.panel-collapse').on('shown.bs.collapse', function (e) {
  var $panel = $(this).attr('id');
  $('html, body').animate(
    {
      scrollTop: $('#' + $panel).offset().top - 130,
    },
    500
  );
});

// HOME SLIDER
new Swiper('.home-slider', {
  loop: true,
  autoplay: {
    delay: 5000,
  },
  effect: 'fade',
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true,
  },
});

// Developers Slider
new Swiper('.devs-slider', {
  loop: true,
  autoplay: {
    delay: 3000,
  },
  slidesPerView: 3,
  spaceBetween: 20,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true,
  },
  breakpoints: {
    // when window width is >= 1200px
    1200: {
      slidesPerView: 7,
    },
    // when window width is >= 992px
    992: {
      slidesPerView: 6,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 5,
    },
    // when window width is >= 576px
    576: {
      slidesPerView: 4,
    },
  },
});

// UNITS SLIDER
new Swiper('.units-slider', {
  loop: true,
  autoplay: {
    delay: 5000,
  },
  spaceBetween: 20,
  centeredSlides: true,
  centerInsufficientSlides: true,
  breakpoints: {
    // when window width is >= 1199px
    1199: {
      slidesPerView: 4,
    },
    991: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
    // when window width is >= 575px
    575: {
      slidesPerView: 1,
    },
  },
  navigation: {
    nextEl: '.units-next-btn',
    prevEl: '.units-prev-btn',
  },
});

// PROJECTS SLIDER
new Swiper('.projects-slider', {
  loop: true,
  autoplay: {
    delay: 5000,
  },
  spaceBetween: 20,
  centeredSlides: true,
  centerInsufficientSlides: true,
  navigation: {
    nextEl: '.proj-next-btn',
    prevEl: '.proj-prev-btn',
  },
  breakpoints: {
    // when window width is >= 1200px
    1200: {
      slidesPerView: 4,
    },
    // when window width is >= 992px
    992: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
    // when window width is >= 576px
    576: {
      slidesPerView: 1,
    },
  }
});

// BLOGS SLIDER
new Swiper('.blogs-slider', {
  loop: true,
  autoplay: {
    delay: 5000,
  },
  spaceBetween: 20,
  centeredSlides: true,
  centerInsufficientSlides: true,
  navigation: {
    nextEl: '.blog-next-btn',
    prevEl: '.blog-prev-btn',
  },
  breakpoints: {
    // when window width is >= 1200px
    1200: {
      slidesPerView: 4,
    },
    // when window width is >= 992px
    992: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
    // when window width is >= 576px
    576: {
      slidesPerView: 1,
    },
  },
});

const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);

// VIEW UNIT THUMBNAIL SLIDER
const galleryThumbs = new Swiper('.gallery-thumbs', {
  loop: true,
  direction: viewportWidth >= 768 ? "vertical" : "horizontal",
  spaceBetween: 10,
  slidesPerView: 4,
  centerInsufficientSlides: true,
  loopedSlides: 5, // looped slides should be the same.
  watchSlidesVisibility: true,
  watchSlidesProgress: true,
});

const galleryTop = new Swiper('.gallery-large', {
  autoplay: true,
  spaceBetween: 10,
  loop: true,
  loopedSlides: 5, // looped slides should be the same.
  thumbs: {
    swiper: galleryThumbs,
  },
  navigation: {
    nextEl: '.gall-unit-next-btn',
    prevEl: '.gall-unit-prev-btn',
  },
});

new Swiper('.master-slider', {
  autoplay: {
    delay: 3000,
  },
  observer: true,
  observeParents: true,
  observeSlideChildren: true,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

new Swiper('.floor-slider', {
  loop: true,
  autoplay: {
    delay: 3000,
  },
  spaceBetween: 20,
  centeredSlides: true,
  centerInsufficientSlides: true,
  observer: true,
  observeParents: true,
  observeSlideChildren: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    dynamicBullets: true
  },
  breakpoints: {
    // when window width is >= 1199px
    1199: {
      slidesPerView: 4,
    },
    991: {
      slidesPerView: 3,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 2,
    },
    // when window width is >= 575px
    575: {
      slidesPerView: 1,
    },
  },
});

new Swiper('.types-slider', {
  loop: true,
  observer: true,
  observeParents: true,
  observeSlideChildren: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    renderBullet: function (index, className) {
      const tabs = [];
      $(".types-slider .swiper-slide").each(function () {
        tabs.push($(this).data("tab"));
      });
      return `<span class=${className}> ${tabs[index]}</span>`;
    },
  },
});

// Floor Project SLIDER
new Swiper('.floor-project-slider', {
  loop: true,
  centerInsufficientSlides: true,
  centeredSlides: true,
  centeredSlidesBounds: true,
  navigation: {
    nextEl: '.floor-proj-next-btn',
    prevEl: '.floor-proj-prev-btn',
  },
});

// panorama SLIDER
new Swiper('.panorama-slider', {
  loop: true,
  centerInsufficientSlides: true,
  centeredSlides: true,
  centeredSlidesBounds: true,
  navigation: {
    nextEl: '.panorama-proj-next-btn',
    prevEl: '.panorama-proj-prev-btn',
  },
});

// *************************************************

// const langBtns = document.querySelectorAll('a.lang-item');

// langBtns.forEach((langBtn) => {
//   langBtn.addEventListener('click', function (e) {
//     e.preventDefault();
//     const langTxt = this.querySelector("span");
//     const langImg = this.querySelector("img");
//     this.classList.toggle('js-x');
//     if (this.classList.contains('js-x')) {
//       langTxt.textContent = 'English';
//       langImg.src = "images/england-flag.png";
//       document.documentElement.setAttribute('dir', 'rtl');
//       $('link[href="css/bootstrap.min.css"]').attr('href', 'css/bootstrap-rtl.min.css');
//     } else {
//       langTxt.textContent = 'عربي';
//       langImg.src = "images/egypt-flag.png";
//       document.documentElement.setAttribute('dir', 'ltr');
//       $('link[href="css/bootstrap-rtl.min.css"]').attr('href', 'css/bootstrap.min.css');
//     }
//   });
// });