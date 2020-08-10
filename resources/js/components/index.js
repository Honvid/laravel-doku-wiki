import Vue from 'vue'
import Card from './Card'
import Child from './Child'
import Button from './Button'
import Checkbox from './Checkbox'
import RecommendBooks from './RecommendBooks'
import MarkdownRender from './MarkdownRender'
import Blacklist from './Blacklist'
import TocSidebar from './TocSidebar'
import Paginate from './Paginate'
import CategorySelecter from './CategorySelecter'
import SidebarBlacklist from './SidebarBlacklist'
import { HasError, AlertError, AlertSuccess } from 'vform'

// Components that are registered globaly.
[
    Card,
    Child,
    Button,
    Checkbox,
    HasError,
    AlertError,
    AlertSuccess,
    RecommendBooks,
    MarkdownRender,
    Blacklist,
    TocSidebar,
    Paginate,
    CategorySelecter,
    SidebarBlacklist,
].forEach(Component => {
    Vue.component(Component.name, Component)
})
