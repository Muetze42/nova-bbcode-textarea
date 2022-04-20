<template>
    <DefaultField
        :field="currentField"
        :errors="errors"
        :full-width-content="true"
        :show-help-text="showHelpText"
    >
        <template #field>
          <textarea
              v-bind="extraAttributes"
              class="w-full form-control form-input form-input-bordered py-3 h-auto"
              :id="currentField.uniqueKey"
              :dusk="field.attribute"
              :value="value"
              @input="handleChange"
          />
            <span v-for="(title, code) in currentField.codes" :class="currentField.btnClass" :title="title" @submit.prevent="" @click="addCode(code)" :style="currentField.btnStyle">
                {{ code }}
            </span>
        </template>
    </DefaultField>
</template>

<script>
import {DependentFormField, HandlesValidationErrors} from './../../mixins'

export default {
    mixins: [HandlesValidationErrors, DependentFormField],

    computed: {
        defaultAttributes() {
            return {
                rows: this.currentField.rows,
                codes: this.currentField.codes,
                btnClass: this.currentField.btnClass,
                btnStyle: this.currentField.btnStyle,
                class: this.errorClasses,
                placeholder: this.field.name,
            }
        },

        extraAttributes() {
            const attrs = this.currentField.extraAttributes

            return {
                ...this.defaultAttributes,
                ...attrs,
            }
        },
    },

    methods: {
        addCode(code) {
            this.value = this.value + " " + code
        }
    }
}
</script>
