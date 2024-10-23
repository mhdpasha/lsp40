

const Footer = () => {
  return (
    <footer className='bg-slate-50 text-black'>
        <div className='container mx-auto flex items-center justify-center h-12'>
          <p className='text-sm'>© {new Date().getFullYear()} LSP 40</p>
        </div>
    </footer>
  )
}

export default Footer
