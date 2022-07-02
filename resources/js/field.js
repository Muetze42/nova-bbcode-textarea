import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('detail-bbcode', DetailField)
  app.component('form-bbcode', FormField)
})
