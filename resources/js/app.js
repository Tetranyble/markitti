/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import { createApp } from 'vue'
import Welcome from './components/ExampleComponent'

const app = createApp({})

const requireComponent = require.context('./components', true, /App[A-Z]\w+\.(vue|js)$/)
requireComponent.keys().forEach(function (fileName) {
    let baseComponentConfig = requireComponent(fileName)
    baseComponentConfig = baseComponentConfig.default || baseComponentConfig
    const baseComponentName = baseComponentConfig.name || (
        fileName
            .replace(/^.+\//, '')
            .replace(/\.\w+$/, '')
    )
    app.component(baseComponentName, baseComponentConfig)
})
app.component('welcome', Welcome)

app.mount('#app')
