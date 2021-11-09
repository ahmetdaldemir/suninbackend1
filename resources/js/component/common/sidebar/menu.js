import React from 'react'
export const MENUITEMS = [
    {
        title: 'General', icon: <i className="pe-7s-home pe-lg"></i>, path: '/default/sample-page', type: 'sub',active: true,bookmark: true, children: [
                {title: 'Dashboard', type: 'sub'},
                { title: 'Default', type: 'link', path:  '/default/sample-page'}
        ]
    },
    {
        title: 'Starter kit', icon: <i className="pe-7s-edit"></i>,  path:  '/starter-kit/sample-page', type: 'sub',active: false, children: [
                {title: 'Sample Page', type: 'sub'},
                { title: 'Sample Page', type: 'link', path:  '/starter-kit/sample-page'},
        ]
    },
    {
        title: 'Support', icon: <i className="pe-7s-note2"></i>,  path: '/support/raise-ticket', type: 'sub',active: false, children: [
                {title: 'Ticket', type: 'sub'},
                { title: 'Raise Ticket', type: 'exteral_link', path: 'http://support.pixelstrap.com/help-center' },
        ]
        
    },
]