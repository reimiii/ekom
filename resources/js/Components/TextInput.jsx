import React, { forwardRef, useEffect, useRef } from 'react';
import clsx from 'clsx';

export default forwardRef(function TextInput(
    {type = 'text', name, value, className, autoComplete, required, isFocused, handleChange, ...props},
    ref
) {
    const input = ref ? ref : useRef();

    useEffect(() => {
        if (isFocused) {
            input.current.focus();
        }
    }, []);

    return (
        <div className="flex flex-col items-start">
            <input
                {...props}
                type={type}
                name={name}
                value={value}
                className={
                    clsx('border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ', className)
                }
                ref={input}
                onChange={(e) => handleChange(e)}
            />
        </div>
    );
});
