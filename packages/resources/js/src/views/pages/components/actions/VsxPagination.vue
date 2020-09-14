<template>
    <div class="con-vs-pagination vs-pagination-primary mt-5" v-if="source.last_page > 1">
        <nav class="vs-pagination--nav">
            <button
                class="vs-pagination--buttons btn-prev-pagination vs-pagination--button-prev"
                :class="{ 'disabled': source.current_page === 1 }"
                @click.prevent="switched(source.current_page - 1)"
            >
                <i class="vs-icon notranslate icon-scale material-icons null">arrow_back</i>
            </button>
            <ul class="vs-pagination--ul">
                <template v-for="(x, i) in pages">
                    <li
                        v-if="parseInt(x)"
                        class="item-pagination vs-pagination--li"
                        :class="{ 'is-current': source.current_page === x }"
                        :key="i"
                        @click.prevent="switched(x)"
                    >
                        <span>{{ x }}</span>
                        <div class="effect"></div>
                    </li>
                    <li v-else class="item-pagination vs-pagination--li" :key="i">
                        <span>{{ x }}</span>
                        <div class="effect"></div>
                    </li>
                </template>
            </ul>
            <button
                class="vs-pagination--buttons btn-next-pagination vs-pagination--button-next"
                :class="{ 'disabled': source.current_page === source.last_page }"
                @click.prevent="switched(source.current_page + 1)"
            >
                <i class="vs-icon notranslate icon-scale material-icons null">arrow_forward</i>
            </button>
            <!---->
        </nav>
    </div>
</template>

<script>
    export default {
        name: "vsx-pagination",
        props: ["source"],
        data() {
            return {
                pages: []
            };
        },
        watch: {
            source(val) {
               this.startPagination(val)
            }
        },
        created() {
            this.startPagination(this.source);
        },
        methods: {
            startPagination(val){
                this.pages = this.generatePagesArray(
                    val.current_page,
                    val.total,
                    val.per_page,
                    6
                );
            },
            switched(page) {
                if (this.pageIsOutOfBounds(page)) {
                    return;
                }

                this.$emit("switched", {page:page});

                // this.$router.replace({
                //     query: Object.assign({}, this.$route.query, { page: page })
                // });
            },
            pageIsOutOfBounds(page) {
                return page <= 0 || page > this.source.last_page;
            },
            generatePagesArray: function(
                currentPage,
                collectionLength,
                rowsPerPage,
                paginationRange
            ) {
                var pages = [];
                var totalPages = Math.ceil(collectionLength / rowsPerPage);
                var halfWay = Math.ceil(paginationRange / 2);
                var position;

                if (currentPage <= halfWay) {
                    position = "start";
                } else if (totalPages - halfWay < currentPage) {
                    position = "end";
                } else {
                    position = "middle";
                }

                var ellipsesNeeded = paginationRange < totalPages;
                var i = 1;
                while (i <= totalPages && i <= paginationRange) {
                    var pageNumber = this.calculatePageNumber(
                        i,
                        currentPage,
                        paginationRange,
                        totalPages
                    );
                    var openingEllipsesNeeded =
                        i === 2 && (position === "middle" || position === "end");
                    var closingEllipsesNeeded =
                        i === paginationRange - 1 &&
                        (position === "middle" || position === "start");
                    if (
                        ellipsesNeeded &&
                        (openingEllipsesNeeded || closingEllipsesNeeded)
                    ) {
                        pages.push("...");
                    } else {
                        pages.push(pageNumber);
                    }
                    i++;
                }
                return pages;
            },

            calculatePageNumber: function(i, currentPage, paginationRange, totalPages) {
                var halfWay = Math.ceil(paginationRange / 2);
                if (i === paginationRange) {
                    return totalPages;
                } else if (i === 1) {
                    return i;
                } else if (paginationRange < totalPages) {
                    if (totalPages - halfWay < currentPage) {
                        return totalPages - paginationRange + i;
                    } else if (halfWay < currentPage) {
                        return currentPage - halfWay + i;
                    } else {
                        return i;
                    }
                } else {
                    return i;
                }
            }
        }
    };
</script>
