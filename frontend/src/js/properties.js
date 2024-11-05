import { findIndex } from "lodash";

const states = {};

const filter = (taxonomy, slug) => {
    const index = findIndex(states[taxonomy], { slug });
    states[taxonomy][index].check = !states[taxonomy][index].check;
    console.log(states)
}

class Main {
    onDOMContentLoaded = () => {
        $('.filter-item').each((_key, element) => {
            $('.filter-list li', element).each((_key, element2) => {
                const taxonomy = $(element).data('taxonomy');
                const slug = $(element2).data('slug');
                $('input', element2).on('click', () => {
                    filter(taxonomy, slug);
                });
                if (!states[taxonomy]) {
                    states[taxonomy] = [];
                }
                states[taxonomy].push({
                    slug,
                    check: false,
                })
            });
        });
    };
  }
  
  const main = new Main();
  window.addEventListener('DOMContentLoaded', main.onDOMContentLoaded);
  