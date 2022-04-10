import ReactDOM from 'react-dom';
import {Tab} from './Tab';
import {tabs_1} from "./tabs1";
import {tabs_2} from './tabs2';
import {tabs_3} from "./tabs3";
import {DocWindow} from "./window";
import {getNames} from "./names";


function Index() {
    let allTabs = [tabs_1(getNames(1)), tabs_2(getNames(2)), tabs_3(getNames(3))];
    let contents = [];
    let tabID =['tabs-1','tabs-2','tabs-3'];
    for (let i = 0; i < allTabs.length; i++) {
        contents[i] = (i === 0) ?
            Tab(tabID[i], allTabs[i], 'active' ,'tab'+i) :
            Tab(tabID[i], allTabs[i], '' ,'tab'+i);
    }
    contents[allTabs.length+1] = <DocWindow key={'0'}/>;
    return contents;
}

const alltabs = document.getElementById('myTabContent');
ReactDOM.render(Index(), alltabs);


