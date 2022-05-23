import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-string-format', IndexField)
  app.component('detail-nova-string-format', DetailField)
  app.component('form-nova-string-format', FormField)
})
