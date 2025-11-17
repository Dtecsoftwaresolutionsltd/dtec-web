const lineLottie = document.querySelector("#line-lottie");
const lineLottie2 = document.querySelector("#line-lottie2");
const lineLottie3 = document.querySelector("#line-lottie-style-2");
const lineLottie4 = document.querySelector("#line-lottie2-style-2");
const lineLottie5 = document.querySelector("#h2-faq-anim-right");
const lineLottie6 = document.querySelector("#h2-faq-anim-left");
const lineLottie7 = document.querySelector("#line-lottie-style-3");
const lineLottie8 = document.querySelector("#line-lottie3-style-3");

function initlineLottie(selector) {
    if (selector) {
        lottie.loadAnimation({
            container: selector, // the dom element that will contain the animation
            renderer: "svg",
            loop: true,
            autoplay: true,
            path: "./assets/lottie/left_lines.json", // the path to the animation json
        });
    }
}
initlineLottie(lineLottie);
initlineLottie(lineLottie2);
initlineLottie(lineLottie3);
initlineLottie(lineLottie4);
initlineLottie(lineLottie5);
initlineLottie(lineLottie6);
initlineLottie(lineLottie7);
initlineLottie(lineLottie8);
const grid = document.getElementById("win-grid");
function inCrease(grid) {
    if (grid) {
        for (let i = 0; i < 1000; i++) {
            const newElement = document.createElement("div");
            newElement.classList.add("win-btn");
            newElement.id = i;
            grid.appendChild(newElement);
        }
        /**
         * You can find an explanation for this code here - https://dev.to/jashgopani
         */
        const offset = 49;
        const angles = []; //in deg
        for (let i = 0; i <= 360; i += 45) {
            angles.push((i * Math.PI) / 180);
        }
        let nearBy = [];

        function clearNearBy() {
            nearBy
                .splice(0, nearBy.length)
                .forEach((e) => (e.style.borderImage = null));
        }

        /*Effect #1 explanation - bit.ly/win10-button-effect*/
        document.querySelectorAll(".win-btn").forEach((b) => {

            b.onmouseleave = (e) => {

                e.target.style.borderImage = null;
                e.target.border = "1px solid transparent";
            };

            b.onmouseenter = (e) => {
                clearNearBy();
            };

            b.addEventListener("mousemove", (e) => {
                const rect = e.target.getBoundingClientRect();
                const x = e.clientX - rect.left; //x position within the element.
                const y = e.clientY - rect.top; //y position within the element.

                e.target.style.borderImage = `radial-gradient(20% 65% at ${x}px ${y}px ,rgba(121, 74, 255,0.7),rgba(121, 74, 255,0.4),rgba(121, 74, 255,0),#eaebf0,transparent ) 9 / 2px / 0px stretch `;
            });
        });

        const body = document.querySelector(".win-grid");

        body.addEventListener("mousemove", (e) => {
            const x = e.x; //x position within the element.
            const y = e.y; //y position within the element.

            clearNearBy();
            nearBy = angles.reduce((acc, rad, i, arr) => {
                const cx = Math.floor(x + Math.cos(rad) * offset);
                const cy = Math.floor(y + Math.sin(rad) * offset);
                const element = document.elementFromPoint(cx, cy);

                if (element !== null) {

                    if (
                        element.className === "win-btn" &&
                        acc.findIndex((ae) => ae.id === element.id) < 0
                    ) {
                        const brect = element.getBoundingClientRect();
                        const bx = x - brect.left; //x position within the element.
                        const by = y - brect.top; //y position within the element.
                        if (!element.style.borderImage)
                            element.style.borderImage = `radial-gradient(${
                                offset * 2
                            }px ${
                                offset * 2
                            }px at ${bx}px ${by}px ,rgba(121, 74, 255,0.7),rgba(121, 74, 255,0.1),transparent ) 9 / 1px / 0px stretch `;
                        return [...acc, element];
                    }
                }
                return acc;
            }, []);
        });

        body.onmouseleave = (e) => {
            clearNearBy();
        };
    }
}
inCrease(grid);

const homeFourBanner = document.querySelector("#hero-banner");
const homeFourImag = document.querySelector("#hero-banner .img");
let perspectiveValue = 20; // Initial perspective value
if (homeFourBanner) {
    document.addEventListener("scroll", (e) => {
        const top = window.pageYOffset || document.documentElement.scrollTop;
        if (homeFourImag) {
            if (top > 500) {
                homeFourImag.style.transform = "none";
            } else {
                const calcValue = perspectiveValue + top / 2;
                homeFourImag.style.transform = `perspective(${calcValue}px) rotateX(1deg)`;
            }
        }
    });
}

// Digital Marketing header scroll controller

window.addEventListener("scroll", () => {
    if (document.querySelector(".h1-header-sticky")) {
        if (window.scrollY >= 76) {
            document
                .querySelector(".h1-header-sticky")
                .classList.remove("h1-header-sticky-qs");
        } else {
            document
                .querySelector(".h1-header-sticky")
                .classList.add("h1-header-sticky-qs");
        }
    }
});

// active tab

const tabList = document.querySelectorAll(".tab_item");
tabList.forEach((item) => {
    item.addEventListener("click", (event) => {
        tabList.forEach((item, index) => {
            if (
                item.getAttribute("name") === event.target.getAttribute("name")
            ) {
                item.classList.add("active-tab");

                document.querySelector(".main-tab-section").scrollLeft =
                    document.getElementById(event.target.getAttribute("name"))
                        .clientWidth * index;
            } else {
                item.classList.remove("active-tab");
            }
        });
    });
});

function typeWriter(
    selector_target,
    text_list,
    placeholder = false,
    i = 0,
    text_list_i = 0,
    delay_ms = 130
) {
    if (!i) {
        if (placeholder) {
            Array.from(document.querySelectorAll(selector_target)).forEach(
                (element) => (element.placeholder = "")
            );

        } else {
            Array.from(document.querySelectorAll(selector_target)).forEach(
                (element) => (element.innerHTML = "")
            );

        }
    }
    txt = text_list[text_list_i];
    if (i < txt.length) {
        if (placeholder) {


            Array.from(document.querySelectorAll(selector_target)).forEach(
                (element) => (element.placeholder += txt.charAt(i))
            );
        } else {


            Array.from(document.querySelectorAll(selector_target)).forEach(
                (element) => (element.innerHTML += txt.charAt(i))
            );
        }
        i++;
        setTimeout(
            typeWriter,
            delay_ms,
            selector_target,
            text_list,
            placeholder,
            i,
            text_list_i
        );
    } else {
        text_list_i++;
        if (typeof text_list[text_list_i] === "undefined") {
            setTimeout(
                typeWriter,
                delay_ms * 5,
                selector_target,
                text_list,
                placeholder
            );
        } else {
            i = 0;
            setTimeout(
                typeWriter,
                delay_ms * 3,
                selector_target,
                text_list,
                placeholder,
                i,
                text_list_i
            );
        }
    }
}

text_list = ["Keyword search...", " "];
text_list2 = ["Email Address...", " "];
text_list3 = ["Full Name...", " "];
text_list4 = ["Your message...", " "];
text_list5 = ["Search...", ""];
text_list6 = ["Coupon Code", ""];

return_value = typeWriter("#h2_search_input", text_list, true);
return_value1 = typeWriter("#eOne", text_list2, true);
return_value2 = typeWriter("#eTwo", text_list2, true);
return_value3 = typeWriter("#eThree", text_list2, true);
return_value4 = typeWriter("#eFour", text_list2, true);
return_value5 = typeWriter("#eFive", text_list2, true);
return_value6 = typeWriter("#fullName", text_list3, true);
return_value7 = typeWriter("#message", text_list4, true);
return_value7 = typeWriter("#search", text_list5, true);
return_value8 = typeWriter("#coupon", text_list6, true);


// video play btn

const videoBtn = document.querySelectorAll(".video-play-btn");
videoBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
        const player = document.getElementById("video-player");
        player.classList.toggle("active-video-player");
    });
});
if (window.gsap) {
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    ScrollTrigger.matchMedia({
  // Desktop only
  "(min-width: 1024px)": function () {
    // create smoother only on desktop
    let device_width = window.innerWidth;
    if (device_width > 100) {
        ScrollSmoother.create({
            smooth: 1.5,
            effects: device_width >= 1025,
            smoothTouch: false,
            normalizeScroll: false,
            ignoreMobileResize: true,
        });
    }
    const progressWrapper = document.querySelector("#progress-wrapper");
    if (device_width > 1280 && progressWrapper) {
        const height = progressWrapper.clientHeight - progressThumbHeight;
        ScrollTrigger.create({
            trigger: ".sticky",
            start: "top 20px",
            end: "bottom 320px",
            pin: true,
            pinSpacing: false,
        });
    }
  },


});

}

// preloader
$(document).ready(function () {
    setTimeout(function () {
        $("#container-preloader").addClass("loaded");
        // Once the container-preloader has finished, the scroll appears
        if ($("#container-preloader").hasClass("loaded")) {
            // It is so that once the container-preloader is gone, the entire preloader section is deleted
            $("#preloader")
                .delay(1000)
                .queue(function () {
                    $(this).remove();
                });
        }
    }, 2000);
});

// dark win grid
const gridDark = document.getElementById("win-grid-dark");

function inCreaseDark(grid) {
    if (grid) {
        for (let i = 0; i < 1000; i++) {
            const newElement = document.createElement("div");
            newElement.classList.add("win-btn-sm");
            newElement.id = i;
            grid.appendChild(newElement);
        }
        /**
         * You can find an explanation for this code here - https://dev.to/jashgopani
         */
        const offset = 49;
        const angles = []; //in deg
        for (let i = 0; i <= 360; i += 45) {
            angles.push((i * Math.PI) / 180);
        }
        let nearBy = [];

        function clearNearBy() {
            nearBy
                .splice(0, nearBy.length)
                .forEach((e) => (e.style.borderImage = null));
        }

        /*Effect #1 explanation - bit.ly/win10-button-effect*/
        document.querySelectorAll(".win-btn-sm").forEach((b) => {

            b.onmouseleave = (e) => {

                e.target.style.borderImage = null;
                e.target.border = "1px solid transparent";
            };

            b.onmouseenter = (e) => {
                clearNearBy();
            };

            b.addEventListener("mousemove", (e) => {
                const rect = e.target.getBoundingClientRect();
                const x = e.clientX - rect.left; //x position within the element.
                const y = e.clientY - rect.top; //y position within the element.
            });
        });

        const body = document.querySelector(".win-grid-dark");
        if (body) {
            body.addEventListener("mousemove", (e) => {
                const x = e.x; //x position within the element.
                const y = e.y; //y position within the element.

                clearNearBy();
                nearBy = angles.reduce((acc, rad, i, arr) => {
                    const cx = Math.floor(x + Math.cos(rad) * offset);
                    const cy = Math.floor(y + Math.sin(rad) * offset);
                    const element = document.elementFromPoint(cx, cy);

                    if (element !== null) {

                        if (
                            element.className === "win-btn-sm" &&
                            acc.findIndex((ae) => ae.id === element.id) < 0
                        ) {
                            const brect = element.getBoundingClientRect();
                            const bx = x - brect.left; //x position within the element.
                            const by = y - brect.top; //y position within the element.
                            if (!element.style.borderImage)
                                element.style.borderImage = `radial-gradient(${
                                    offset * 1.5
                                }px ${
                                    offset * 1.5
                                }px at ${bx}px ${by}px ,#00DF8E 0%,rgba(0, 223, 142, 0) 100%,transparent ) 9 / 1px / 0px stretch `;
                            return [...acc, element];
                        }
                    }
                    return acc;
                }, []);
            });
            body.onmouseleave = (e) => {
                clearNearBy();
            };
        }
    }
}

inCreaseDark(gridDark);

const dropdown = document.getElementById("dropdown-box");
if (dropdown) {
    dropdown.addEventListener("click", (event) => {
        event.target.nextElementSibling.classList.toggle("dropdown-deActive");
    });
}

if (dropdown) {
    window.addEventListener("click", (e) => {
        if (!e.target.classList.value.includes("dropdown")) {
            document.querySelectorAll(".dropdown-div").forEach((element) => {
                if (!element.classList.value.includes("dropdown-deActive")) {
                    element.classList.add("dropdown-deActive");
                }
            });
        }
    });
}

// user dashboard scrollable sidebar responsive
// handle sidebar scroll next prev button
if (document.querySelector("#scrollContainer")) {
    const scrollContainer = document.getElementById("scrollContainer");
    const sections = document.querySelectorAll(".scroll-section");
    let currentIndex = 0;
    function toggleShow() {
        const scrollLeft = scrollContainer.scrollLeft; // Current scroll position
        const scrollWidth = scrollContainer.scrollWidth; // Total scrollable width
        const clientWidth = scrollContainer.clientWidth; // Visible width
        if (scrollLeft + clientWidth < scrollWidth) {
            document.getElementById("nextButton").classList.remove("hidden");
        } else {
            document.getElementById("nextButton").classList.add("hidden");
        }
        if (scrollLeft > 20) {
            document.getElementById("prevButton").classList.remove("hidden");
        } else {
            document.getElementById("prevButton").classList.add("hidden");
        }
    }

    if (scrollContainer) {
        scrollContainer.addEventListener("scroll", () => {
            toggleShow();
        });
    }

    if (document.getElementById("nextButton")) {
        document.getElementById("nextButton").addEventListener("click", () => {
            if (currentIndex < sections.length - 1) {
                currentIndex++;
                scrollContainer.scrollLeft +=
                    sections[currentIndex].clientWidth;
            }
        });
    }

    if (document.getElementById("prevButton")) {
        document.getElementById("prevButton").addEventListener("click", () => {
            if (currentIndex > 0) {
                currentIndex--;
                scrollContainer.scrollLeft -=
                    sections[currentIndex].clientWidth;
            } else if (currentIndex === 0) {
                scrollContainer.scrollLeft = 0;
            }
        });
    }

    function scrollToSection(index) {
        sections[index].scrollIntoView({ behavior: "smooth", inline: "start" });
    }

    window.addEventListener(onload, toggleShow());
}

// custom select
var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /* For each option in the original select element,
    create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /* When an item is clicked, update the original select box,
        and the selected item: */
            var y, i, k, s, h, sl, yl;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y =
                        this.parentNode.getElementsByClassName(
                            "same-as-selected"
                        );
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /* When the select box is clicked, close any other select boxes,
    and open/close the current select box: */
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
    /* A function that will close all select boxes in the document,
  except the current select box: */
    var x,
        y,
        i,
        xl,
        yl,
        arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i);
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}

// Reusable accordion logic for all .accordion-toggle
function openAccordion(content, arrow) {
    content.style.transition = "max-height 0.3s ease";
    content.style.maxHeight = content.scrollHeight + "px";
    arrow.classList.add("rotate-180");
    // After transition, set max-height to none for natural growth
    content.addEventListener("transitionend", function handler() {
        if (content.style.maxHeight !== "0px") {
            content.style.maxHeight = "none";
        }
        content.removeEventListener("transitionend", handler);
    });
}

function closeAccordion(content, arrow) {
    // Set max-height to current height for transition
    content.style.transition = "max-height 0.3s ease";
    content.style.maxHeight = content.scrollHeight + "px";
    // Force reflow
    void content.offsetWidth;
    content.style.maxHeight = "0px";
    arrow.classList.remove("rotate-180");
}

document.querySelectorAll(".accordion-toggle").forEach((toggle) => {
    toggle.addEventListener("click", function () {
        const content = this.nextElementSibling;
        const arrow = this.querySelector(".accordion-arrow");
        const isOpen =
            content.style.maxHeight &&
            content.style.maxHeight !== "0px" &&
            content.style.maxHeight !== "";

        if (isOpen || content.style.maxHeight === "none") {
            closeAccordion(content, arrow);
            // Also close all child accordions
            content.querySelectorAll(".accordion-content").forEach((child) => {
                child.style.maxHeight = "0px";
                const childArrow =
                    child.previousElementSibling?.querySelector(
                        ".accordion-arrow"
                    );
                if (childArrow) childArrow.classList.remove("rotate-180");
            });
        } else {
            openAccordion(content, arrow);
            // If parent, close siblings (optional, for one-at-a-time behavior)
        }
    });
    // On page load, ensure all are closed except those with 'active' class
    const content = toggle.nextElementSibling;
    const accordionItem = toggle.closest(".accordion-item");
    if (content) {
        if (accordionItem && accordionItem.classList.contains("active")) {
            // Keep active accordions open
            content.style.maxHeight = "none";
        } else {
            // Close inactive accordions
            content.style.maxHeight = "0px";
        }
    }
});

/**
 * Initialize Range Slider Input
 * Creates an interactive dual-handle range slider with synchronized input fields
 *
 * @param {string} parentSelector - CSS selector for the parent container
 * @param {number} rangeStep - Minimum gap between min and max values (default: 0)
 */

function resizeInput(input, sizerId) {
    const sizer = document.getElementById(sizerId);
    if (!sizer) return;

    sizer.textContent = input.value || "0";
    input.style.width = sizer.offsetWidth + 2 + "px"; // +2px buffer
}

// Optional: apply on load
document.addEventListener("DOMContentLoaded", () => {
    resizeInput(document.querySelector(".min-input"), "min-price-sizer");
    resizeInput(document.querySelector(".max-input"), "max-price-sizer");
});

function initializeRangeInput(parentSelector, rangeStep = 0) {
    const parentElement = document.querySelector(parentSelector);

    if (!parentElement) {
        console.error(
            `Parent element not found for selector: ${parentSelector}`
        );
        return;
    }

    // Get required elements
    const rangeValue = parentElement.querySelector(
        ".slider-container .range-slider"
    );
    const rangeInputs = parentElement.querySelectorAll(".range-input input");
    const valueInputs = parentElement.querySelectorAll(".value-input input");

    if (!rangeValue || rangeInputs.length < 2 || valueInputs.length < 2) {
        console.error(
            "Required elements are missing for price range initialization."
        );
        return;
    }

    // Set initial position of the range slider based on initial values
    const initialMinValue = parseInt(rangeInputs[0].value);
    const initialMaxValue = parseInt(rangeInputs[1].value);
    const maxRangeValue = parseInt(rangeInputs[0].max);

    // Calculate percentage positions for the slider handles
    rangeValue.style.left = `${(initialMinValue / maxRangeValue) * 100}%`;
    rangeValue.style.right = `${
        100 - (initialMaxValue / maxRangeValue) * 100
    }%`;

    // Make sure value inputs match range inputs initially
    valueInputs[0].value = initialMinValue;
    valueInputs[1].value = initialMaxValue;

    // Sync numeric input fields with range slider inputs
    valueInputs.forEach((input, index) => {
        input.addEventListener("input", (e) => {
            // Get current min/max values from inputs
            let minPrice = parseInt(valueInputs[0].value);
            let maxPrice = parseInt(valueInputs[1].value);

            // Enforce min/max boundaries
            if (minPrice < 0) {
                valueInputs[0].value = 0;
                minPrice = 0;
            }

            if (maxPrice > 10000) {
                valueInputs[1].value = 10000;
                maxPrice = 10000;
            }

            // Enforce minimum gap between handles if specified
            if (maxPrice - minPrice < rangeStep) {
                if (index === 0) {
                    // If changing min value, adjust it down
                    valueInputs[0].value = maxPrice - rangeStep;
                    minPrice = maxPrice - rangeStep;
                } else {
                    // If changing max value, adjust it up
                    valueInputs[1].value = minPrice + rangeStep;
                    maxPrice = minPrice + rangeStep;
                }
            }

            // Update range inputs to match
            rangeInputs[0].value = minPrice;
            rangeInputs[1].value = maxPrice;

            // Update visual slider position
            rangeValue.style.left = `${(minPrice / 10000) * 100}%`;
            rangeValue.style.right = `${100 - (maxPrice / 10000) * 100}%`;
        });
    });

    // Sync range slider with numeric input fields
    rangeInputs.forEach((input, index) => {
        input.addEventListener("input", (e) => {
            // Get current min/max values from range inputs
            let minValue = parseInt(rangeInputs[0].value);
            let maxValue = parseInt(rangeInputs[1].value);

            // Enforce minimum gap between handles if specified
            if (maxValue - minValue < rangeStep) {
                if (index === 0) {
                    // If moving left handle, adjust it left
                    rangeInputs[0].value = maxValue - rangeStep;
                } else {
                    // If moving right handle, adjust it right
                    rangeInputs[1].value = minValue + rangeStep;
                }
            }

            // Update numeric inputs to match
            valueInputs[0].value = rangeInputs[0].value;
            valueInputs[1].value = rangeInputs[1].value;
            resizeInput(valueInputs[0], "min-price-sizer");
            resizeInput(valueInputs[1], "max-price-sizer");
            // Update visual slider position
            rangeValue.style.left = `${(minValue / rangeInputs[0].max) * 100}%`;
            rangeValue.style.right = `${
                100 - (maxValue / rangeInputs[0].max) * 100
            }%`;
        });
    });
}

// Initialize range sliders if they exist on the page
if (document.querySelector(".range-input-container")) {
    initializeRangeInput(".range-input-container");
}

// filter control

const filterBtns = document.querySelectorAll(".filterBtn");
if (filterBtns) {
    filterBtns.forEach((filterBtn) => {
        filterBtn.addEventListener("click", () => {
             const filterSec = document.querySelector("#filter");
                filterSec.classList.toggle("active");
        });
    });
}

// navs-tabs
const tabs = document.querySelectorAll(".tab-btn");
const navContent = document.querySelectorAll(".content");

tabs.forEach((tab) => {
    tab.addEventListener("click", (e) => {
        // Remove active class from all tabs
        tabs.forEach((tab) => {
            tab.classList.remove("active");
        });
        // Add active class to the clicked tab
        tab.classList.add("active");

        // Get the tab ID from the data attribute
        const tabId = tab.getAttribute("data-tab");

        // Hide all content
        navContent.forEach((content) => {
            content.classList.remove("active");
        });
        // Show the content for the clicked tab
        document.getElementById(tabId).classList.add("active");
    });
});

// nabs and tabs
function setupTabs(containerId) {
    const container = document.getElementById(containerId);
    const tabs = container.querySelectorAll(".tablinks");
    const contents = container.querySelectorAll(".tabcontent");
    const sidebarContent = container.querySelectorAll(".tabSidebar");
    const prevBtns = container.querySelectorAll(".prev-btn");
    const nextBtns = container.querySelectorAll(".next-btn");

    function updateButtonStates(currentTabIndex) {
        const totalTabs = tabs.length;

        // Update prev button
        prevBtns.forEach((btn) => {
            if (currentTabIndex === 0) {
                // First step: show "Cancel" with error styling
                btn.textContent = "Cancel";
                btn.classList.add("text-error-dark");
            } else {
                // Other steps: show "Previous" without error styling
                btn.textContent = "Previous";
                btn.classList.remove("text-error-dark");
            }
        });

        // Update next button
        nextBtns.forEach((btn) => {
            if (currentTabIndex === totalTabs - 1) {
                // Last step: show "Pay Now"
                btn.textContent = "Pay Now";
            } else {
                // Other steps: show "Next Step"
                btn.textContent = "Next Step";
            }
        });
    }

    function openTab(tabIndex) {
        contents.forEach((content) => content.classList.add("hidden"));
        sidebarContent.forEach((content) => content.classList.add("hidden"));
        tabs.forEach((tab, index) => {
            if (index <= tabIndex) {
                tab.classList.replace("bg-green/10", "bg-green");
                tab.classList.replace("text-green", "text-white");
            } else {
                tab.classList.replace("bg-green", "bg-green/10");
                tab.classList.replace("text-white", "text-green");
            }
        });
        contents[tabIndex].classList.remove("hidden");
        sidebarContent[tabIndex].classList.remove("hidden");

        // Update button states
        updateButtonStates(tabIndex);
    }

    function navigateTabs(direction) {
        let currentTab = [...contents].findIndex(
            (content) => !content.classList.contains("hidden")
        );
        let newIndex = currentTab + direction;
        if (newIndex >= 0 && newIndex < tabs.length) {
            openTab(newIndex);
        } else if (direction > 0) {
            document.getElementById("successModal").classList.toggle("hidden");
        }
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener("click", () => openTab(index));
    });

    container
        .querySelectorAll(".prev-btn")
        .forEach((item) =>
            item.addEventListener("click", () => navigateTabs(-1))
        );
    container
        .querySelectorAll(".next-btn")
        .forEach((item) =>
            item.addEventListener("click", () => navigateTabs(1))
        );

    openTab(0);
}

if (document.getElementById("tab-container")) {
    setupTabs("tab-container");
}

const paymentBtn = document.querySelectorAll(".payment-check");
if (paymentBtn) {
    paymentBtn.forEach((btn) => {
        btn.addEventListener("click", () => {
            paymentBtn.forEach((btns) => {
                if (btns.getAttribute("name") === btn.getAttribute("name")) {
                    btns.classList.toggle("current");
                } else {
                    btns.classList.remove("current");
                }
            });
        });
    });
}


// active-btn
$(".size li  ").on("click", function () {
	// set active class
	$(".size li ").removeClass("active");
	$(this).addClass("active");
});
