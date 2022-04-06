export function Tab(tabsID, content, active = '', label){
    return(
        <div key={label} className={"tab-pane fade show " + active} id={tabsID} role="tabpanel" aria-labelledby={label}>
            {content}
        </div>
    );
}
