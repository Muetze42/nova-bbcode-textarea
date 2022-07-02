import FormField from './components/bbcode/FormField'
import FormField2 from './components/bb/FormField'

Nova.booting((app, store) => {
    app.component('form-bbcode', FormField)
    app.component('form-bb', FormField2)
})
