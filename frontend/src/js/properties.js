import { findIndex } from "lodash";

const states = {};

const filter = (taxonomy, slug) => {
    const index = findIndex(states[taxonomy], { slug });
    states[taxonomy][index].check = !states[taxonomy][index].check;
    console.log(states)

    $('.property .property-head').each((_, element) => {
        let isHit = true;
        const type = $(element).data("type");
        const line = $(element).data("line");
        const area = $(element).data("area");
        // 種類チェック
        $('.filter-item[data-taxonomy="properties_type"] li').each((_, f) => {
            const slug = $(f).data('slug');
            const check = $('input', f).prop('checked');
            if (check) {
                const bool = type.includes(slug);
                if (!bool) {
                    isHit = false;
                }
            }
        });
        // 沿線チェック
        $('.filter-item[data-taxonomy="properties_line"] li').each((_, f) => {
            const slug = $(f).data('slug');
            const check = $('input', f).prop('checked');
            if (check) {
                const bool = line.includes(slug);
                if (!bool) {
                    isHit = false;
                }
            }
        });
        // エリアチェック
        $('.filter-item[data-taxonomy="properties_area"] li').each((_, f) => {
            const slug = $(f).data('slug');
            const check = $('input', f).prop('checked');
            if (check) {
                const bool = area.includes(slug);
                if (!bool) {
                    isHit = false;
                }
            }
        });

        if (isHit) {
            $(element).removeClass('-hide');
        } else {
            $(element).addClass('-hide');
        }
    });
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
  