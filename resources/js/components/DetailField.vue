<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div class="flex items-center text-90 whitespace-nowrap">
                <span v-if="!externalLink">{{field.value}}</span>
                <a :href="openExternal()" target="_blank" class="link-default" v-if="externalLink">{{ field.value }}</a>
                <span class="sidebar-icon text-gray-400 px-3 cursor-pointer" @click.stop="copyText" v-if="useCopy">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd" opacity=".6">
                            <g>
                                <g>
                                    <g>
                                        <g>
                                            <path d="M0 0H24V24H0z" transform="translate(-275 -439) translate(32 116) translate(231 311) translate(12 12)"/>
                                            <path fill="#94a2b8" fill-rule="nonzero" d="M13.672 22.39c1.726 0 2.648-.93 2.648-2.663v-1.438h1.29c1.726 0 2.648-.937 2.648-2.672V9.57c0-1.086-.235-1.78-.875-2.445l-3.86-3.93c-.617-.625-1.351-.875-2.312-.875h-2.89c-1.72 0-2.641.93-2.641 2.664V6.43H6.39c-1.726 0-2.648.93-2.648 2.664v10.633c0 1.742.922 2.664 2.649 2.664h7.28zm3.742-5.89H16.32v-2.703c0-1.086-.148-1.625-.828-2.313l-4.18-4.234c-.562-.578-1.07-.773-1.843-.813V5.149c0-.671.336-1.039 1.047-1.039h3.101v3.485c0 1.023.578 1.593 1.594 1.593h3.258v6.274c0 .672-.344 1.039-1.055 1.039zM18 7.773h-2.594c-.265 0-.375-.117-.375-.375V4.766L18 7.773zM13.477 20.61H6.578c-.71 0-1.047-.367-1.047-1.047V9.258c0-.672.336-1.04 1.047-1.04h2.25v4.032c0 1.25.61 1.844 1.844 1.844h3.86v5.469c0 .68-.345 1.046-1.055 1.046zm.867-8.023H10.82c-.328 0-.476-.149-.476-.484V8.523l4 4.063z" transform="translate(-275 -439) translate(32 116) translate(231 311) translate(12 12)"/>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </span>
            </div>
        </template>
    </PanelItem>
</template>

<script>
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    data () {
        return {
            stringLimit: this.field.stringLimit,
            useCopy: this.field.useCopy,
            externalLink: this.field.externalLink
        }
    },
    methods: {
        async copyText() {
            try {
                await navigator.clipboard.writeText(this.field.value);
                Nova.success('String is copy')
                // self.$toasted.show("Yay, it worked!", {type: "success"});
            } catch($e) {
                alert('Cannot copy');
            }
        },
        openExternal() {
            return this.field.externalPath + this.field.value
        }
    },

}
</script>
