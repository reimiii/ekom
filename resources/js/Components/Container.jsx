export const Container = ({children}) => {
    return (
        <div className={`max-w-screen-lg mx-auto px-4`}>
            {children}
        </div>
    )
}